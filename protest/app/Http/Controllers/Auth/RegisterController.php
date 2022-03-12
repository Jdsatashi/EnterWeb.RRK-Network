<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'role' => ['required', 'integer', 'max:255'],
            'phonenumber'=> ['required', 'string', 'min:8', 'max:14'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'role' => $data['role'],
            'phonenumber' => $data['phonenumber'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect() -> route('admin');
    }

    public function edit(User $user)
    {
        if(auth()->user()->role == 1){
            return view('Admin.edit', compact('user'));
        }
        else {
            $this -> authorize('update', $user->profile);
            return view('Admin.edit', compact('user'));
        }
    }

    public function update(User $user)
    {
        if(auth()->user()->role == 1) {
            $data = request() -> validate ([
                'name' => ['required', 'string', 'max:255'],
                'role' => [ 'required' ,'integer', 'max:255'],
                'phonenumber'=> ['required', 'string', 'min:8', 'max:14'],
            ]);

            $user-> update($data);
            return redirect() -> route('admin');
        }
        else {
            $data = request() -> validate ([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required' ,'string', 'max:255'],
                'phonenumber'=> ['required', 'string', 'min:8', 'max:14'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);

            $user-> update($data);
            return redirect('/home');
        }
    }

    public function destroy(User $user,Request $request)
    {
        $request->user()->where('id', $user->id)->delete();
        return back();
    }
}
