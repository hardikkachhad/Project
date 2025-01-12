<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class logincontroller extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function index()
    {
        return view('index');
    }
    public function registerstore(Request $request)
    {
        $request->validate([
            'email' => "required",
            'password' => "required",
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('index')->with('success', 'dfgdfgdfgdgdfg');
            } else {
                return back()->with('Failed', 'User not Found.');
            }
        }
    }
    public function login()
    {
        return view('logim');
    }

    public function loginstore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'name' => 'required',
            'password' => 'required|min:8'
        ]);
        if ($validate->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            if ($user) {
                return response()->json([
                    "status" => true,
                    "message" => "User created successfully"
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "errors" => $validate->errors()
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('register');
    }
}
