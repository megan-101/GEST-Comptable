<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface TracesInterface
{
    public function all();

    public function find($id);

}
