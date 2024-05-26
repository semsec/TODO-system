<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function scopeComplete($query)
    {
        return $query->where('status', 'complete')->orderBy('updated_at', 'desc');
    }

    function scopeIncomplete($query)
    {
        return $query->where('status', 'incomplete')->orderBy('updated_at', 'desc');
    }

    function scopeDefault($query)
    {
        return $query->where('status', 'complete')
                     ->whereDate('updated_at', '>=', Carbon::now()->subWeek());
    }
}
