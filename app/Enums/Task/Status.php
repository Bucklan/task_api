<?php

namespace App\Enums\Task;

use BenSampo\Enum\Enum;

class Status extends Enum
{
    const Pending = 'pending';
    const InProgress = 'in_progress';
    const Completed = 'completed';
}