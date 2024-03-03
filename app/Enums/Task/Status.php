<?php

namespace App\Enums\Task;

use BenSampo\Enum\Enum;

class Status extends Enum
{
    const pending = 'pending';
    const in_progress = 'in_progress';
    const completed = 'completed';
}