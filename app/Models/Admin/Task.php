<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $guarded = ['id'];

    protected const STATUS = [
        0 => 'Pending',
        1 => 'In Progress',
        2 => 'Completed',
    ];

    // Accessor for the status attribute
    public function getStatusTextAttribute(): string
    {
        return self::STATUS[$this->status] ?? 'Unknown';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
