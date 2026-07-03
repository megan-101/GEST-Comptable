<?php

namespace App\Implementations;

use App\Events\TracesEvent;
use App\Interfaces\TracesInterface;
use App\Models\Traces;
use Illuminate\Http\Request;

class TracesImpl implements TracesInterface
{
    public function all()
    {
        return Traces::all();
    }
     public function find($id)
    {
        return PostComptable::findOrFail($id);
    }
}