<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->role==1|| Auth::user()->role==2) {

            $users = User::where('role',2)->orWhere('role',3)->get();
            return view('admin.users.index',compact('users'));
        }
        else{
            return 'you have no permission this function';
        }
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request['user_name']= Str::slug($request->user_name);
        // return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'user_name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);



        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_name' => $request->user_name,
            'role'=>$request->role,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('user.manage')->with('success','user create successfully');
    }

    public function is_active(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->status == 0) {
            $user->status = 1;
            $user->save();
        } else {
            $user->status = 0;
            $user->save();
        }

        return redirect()->route('user.manage')->with('success', 'user update successfully');
    }
}
