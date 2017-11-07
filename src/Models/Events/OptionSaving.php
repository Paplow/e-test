<?php

namespace Paplow\eTest\Models\Events;

use Illuminate\Queue\SerializesModels;
use Paplow\eTest\Models\Option;

class OptionSaving
{
    use SerializesModels;

    public function __construct(Option $option)
    {
        $option->answer = strtolower($option->answer);
    }
}