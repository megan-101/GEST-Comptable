<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface LogInterface
{
    public function save(array $data);

    public function All(array $data);

    public function read(array $data);

}
