<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'nullable|in:pending,in_progress,completed',
            'deadline_at' => 'required|date|after:yesterday',
        ];
    }
}
