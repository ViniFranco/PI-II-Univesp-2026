<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    /** @use HasFactory<\Database\Factories\GuardianFactory> */
    use HasFactory, SoftDeletes, HasUlids;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'birth_date',
        'street',
        'complement',
        'number',
        'neighborhood',
        'city',
        'state',
        'zip_code',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
