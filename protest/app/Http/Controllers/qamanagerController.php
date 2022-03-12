<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class qamanagerController extends Controller
{
    public function index(){
        return view('QAM.index');
    }
}
