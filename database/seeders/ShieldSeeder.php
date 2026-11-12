<?php

namespace Database\Seeders;

use App\Enums\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $defaultPermissions = $this->getDefaultPermissionsForRoles();

        foreach (Roles::cases() as $role) {
            $accessRole = Role::firstOrCreate(['name' => $role->value]);

            $accessRole->syncPermissions($defaultPermissions[$role->value]);
        }
    }

    private function getDefaultPermissionsForRoles(): array
    {
        $resources = [
            'Student',
            'SchoolClass',
            'PedagogicalRecord',
            'Guardian',
            'Enrollment',
            'Communication',
        ];

        $viewPermissions = $this->getPermissionsForResources($resources, ['viewAny', 'view']);
        $managerPermissions = $this->getPermissionsForResources(
            $resources,
            ['viewAny', 'view', 'update', 'delete', 'deleteAny'],
        );
        $teacherPermissions = [
            ...$viewPermissions,
            ...$this->getPermissionsForResources(
                ['PedagogicalRecord', 'Communication'],
                ['create', 'update'],
            ),
        ];
        $tutorPermissions = $viewPermissions;

        foreach (array_unique([...$managerPermissions, ...$teacherPermissions, ...$tutorPermissions]) as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => config('auth.defaults.guard'),
            ]);
        }

        $allPermissionsForDefaultGuard = Permission::query()
            ->where('guard_name', config('auth.defaults.guard'))
            ->pluck('name')
            ->all();

        return [
            Roles::ADMIN->value => $allPermissionsForDefaultGuard,
            Roles::MANAGER->value => $managerPermissions,
            Roles::TEACHER->value => $teacherPermissions,
            Roles::TUTOR->value => $tutorPermissions,
        ];
    }

    private function getPermissionsForResources(array $resources, array $methods): array
    {
        $configuredMethods = config('filament-shield.policies.methods', []);

        $methods = array_intersect($methods, $configuredMethods);

        $permissions = [];

        foreach ($resources as $resource) {
            foreach ($methods as $method) {
                $permissions[] = ucfirst($method).':'.$resource;
            }
        }

        return $permissions;
    }
}
