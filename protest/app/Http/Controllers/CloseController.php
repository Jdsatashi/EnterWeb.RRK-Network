<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Close;

class CloseController extends Controller
{
    public function index(Close $close){
        $close = Close::all();
        return view('close.show', compact('close'));
    }
    /*
    public function create(Close $close){
        return view('close.create');
    }
    public function store()
    {
        $data = request()->validate([
            'closure_date' => 'required',
            'final_closure_date' => 'required',

        ]);
        Close::Create([
            'closure_date' => $data['closure_date'],
            'final_closure_date' => $data['final_closure_date']
        ]);
        return redirect()->route('close.show');
    } */

    public function update(Close $close)
    {
        {
            $data = request()->validate([
                'closure_date' => 'required',
                'final_closure_date' => 'required',
            ]);
            $close -> Update([
                'closure_date' => $data['closure_date'],
                'final_closure_date' => $data['final_closure_date']
            ]);
            return redirect()->route('close.show');
        }
    }

    public function edit(Close $close)
    {
        return view('close.edit',    compact('close'));
    }



}
