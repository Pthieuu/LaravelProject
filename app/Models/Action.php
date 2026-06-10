<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'sdg_number',
        'sdg_title',
        'title',
        'description',
        'owner',
        'impact_score',
        'status',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'completed_at' => 'datetime',
        ];
    }

    public function getIsCompleteAttribute(): bool
    {
        return $this->status === 'done';
    }
}
