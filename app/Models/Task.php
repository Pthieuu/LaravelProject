<?php

namespace App\Models;

use App\Constants\TaskStatus;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusLabel(): string
    {
        return TaskStatus::label($this->status);
    }

    public function statusBadgeClass(): string
    {
        return TaskStatus::badgeClass($this->status);
    }
}
