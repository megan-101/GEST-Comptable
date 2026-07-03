<?php

namespace App\Http\Controllers;

use App\Models\Trace;
use Illuminate\Http\Request;

class TraceController extends Controller
{
    public function index(){
        
        $traces = Trace::Latest()-> get();
        return view('traces.index', compact('traces'));
    }
    public function liste($id){
        $traces = Trace::findOrFail($id);
        return view('traces.liste', compact('traces'));

    }
}
