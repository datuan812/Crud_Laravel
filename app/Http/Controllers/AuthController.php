<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Phương thức hiển thị form đăng nhập
public function showLoginForm()
{
    return view('auth.login');
}

// Phương thức xử lý đăng nhập
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Đăng nhập thành công
        $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
        Session::put('name', $user->name);
        return redirect()->intended('/');
    } else {
        // Đăng nhập không thành công
        return redirect()->route('login')->with('error', 'Email or password is incorrect!');
    }
}

// Phương thức đăng xuất
public function logout()
{
    Auth::logout();
    Session::forget('name');
    return redirect()->route('login')->with('messlogout', 'Logout success!');
}

public function showRegistrationForm()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ], [
        'name.required' => 'Please enter name',
        'name.max' => 'The name cannot exceed 255 characters',
        'username.required' => 'Please enter username',
        'username.max' => 'Username cannot exceed 255 characters',
        'username.unique' => 'Username already exists',
        'email.required' => 'Please enter email',
        'email.email' => 'Invalid email',
        'email.unique' => 'Email already exists',
        "password.required" => "Please enter password",
        "password.min" => "The password field must be at least 6 characters.",
        "password.confirmed" => "Password and Confirm Password do not match"
    ]);

    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    Auth::login($user);

    return redirect('/login')->with('message', 'Register success!');
}


public function showChangePasswordForm()
{
    return view('auth.changePassword');
}


public function changePassword(Request $request)
{
    $user = Auth::user();

    $rules = [
        'current_password' => 'required|password',
        'password' => 'required|min:6|confirmed',
    ];

    $customMessages = [
        "current_password.required" => "Please enter old password",
        "current_password.password" => "Current password is incorrect!",
        "password.required" => "Please enter password",
        "password.min" => "The password field must be at least 6 characters.",
        "password.confirmed" => "Password and Confirm Password do not match"
    ];

    $validator = Validator::make($request->all(), $rules, $customMessages);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->intended('/')->with('change', 'Change Password Success!');
}
}
