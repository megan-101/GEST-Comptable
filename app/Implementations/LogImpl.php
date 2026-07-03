<?php

namespace App\Implementations;

use App\Events\LogEvent;
use App\Interfaces\LogInterface;

class LogImpl implements LogInterface
{
    public function save(array $data){
        event(new LogEvent($data));
    }
}