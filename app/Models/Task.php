<?php

namespace App\Models;

use App\Enums\Task\Status as TaskStatus;
use App\Models\Traits\TaskSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory,TaskSearch;

    protected $fillable = [
        'title',
        'description',
        'status',
        'deadline_at',
    ];

    protected $casts = [
        'status' => TaskStatus::class,
        'deadline_at' => 'datetime',
    ];
}
