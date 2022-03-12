<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class qacoorController extends Controller
{
    public function index(){
        return view('QAC.index');
    }
}
