<?php

namespace App\Models\Traits;

use App\Enums\Task\Status;

trait TaskSearch
{
    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%') ?: null;
    }

    public function scopeStatus($query, $status)
    {
        if (isset($status) && Status::hasKey($status)) {
            return $query->where('status', $status);
        }
        return $query->where('status', Status::pending);
    }

    public function scopeDeadline($query, $deadline)
    {
        return $query->where('deadline_at', '<=', $deadline);

    }
}