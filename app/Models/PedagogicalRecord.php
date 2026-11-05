<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedagogicalRecord extends Model
{
    /** @use HasFactory<\Database\Factories\PedagogicalRecordFactory> */
    use HasFactory, SoftDeletes, HasUlids;

    protected $fillable = [
        'user_id',
        'enrollment_id',
        'content',
        'has_medical_report',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
