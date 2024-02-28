<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $description
 * @property mixed $status
 * @property mixed $deadline_at
 */
class TaskResource extends JsonResource
{


    private function deadline_format($deadline_date)
    {
        $result = '';

        if ($deadline_date->isTomorrow()) {
            $result = 'tomorrow';
        } elseif ($deadline_date->isToday()) {
            $result = 'today';
        } elseif ($deadline_date->isCurrentWeek()) {
            $result = 'this week';
        } elseif ($deadline_date->isCurrentMonth()) {
            $result = 'this month';
        } else {
            $result = $deadline_date->diffForHumans();
        }
        return $result;
    }
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'deadline' => $this->deadline_format($this->deadline_at),
//            'deadline_at' => $this->deadline_at,
        ];
    }
}
