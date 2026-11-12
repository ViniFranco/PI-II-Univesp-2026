<?php

namespace App\Models;

use App\Enums\CommunicationReturnStatus;
use Database\Factories\CommunicationFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Communication extends Model
{
    /** @use HasFactory<CommunicationFactory> */
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'student_id',
        'description',
        'communication_channel',
        'communication_return_status',
    ];

    protected $casts = [
        'description' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    #[Scope]
    public function scopeReturnStatus(Builder $query, CommunicationReturnStatus $status): void
    {
        $query->where('communication_return_status', $status->value);
    }
}
