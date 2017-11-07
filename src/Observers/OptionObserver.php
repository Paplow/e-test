<?php

namespace Paplow\eTest\Observers;

class OptionObserver
{
    public function saving($option)
    {
        $option->answer = strtolower($option->answer);
    }
}
