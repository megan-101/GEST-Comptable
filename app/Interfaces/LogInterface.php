<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface LogInterface
{
    public function save(array $data);
}
