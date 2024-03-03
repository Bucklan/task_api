<?php

namespace App\Http\Requests;

use App\Enums\Task\Status;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'nullable|enum_key:'. Status::class,
            'deadline_at' => 'required|date|after:yesterday',
        ];
    }
}
