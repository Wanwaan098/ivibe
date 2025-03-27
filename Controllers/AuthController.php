<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->only('Email', 'MatKhau');

        // Tìm người dùng theo email
        $user = User::where('Email', $credentials['Email'])->first();

        // So sánh mật khẩu dạng văn bản thô
        if ($user && $credentials['MatKhau'] === $user->MatKhau) {
            Auth::login($user, $request->has('remember'));

            // Chuyển hướng dựa trên vai trò
            if ($user->VaiTro === 'VIEWER') {
                return redirect()->route('articless.index');
            } elseif ($user->VaiTro === 'ADMIN') {
                return redirect()->route('dashboard'); // Sửa từ articles.index thành dashboard
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['Email' => 'Email hoặc mật khẩu không đúng.']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        $request->validate([
            'TenDangNhap' => 'required|string|max:50',
            'Email' => 'required|email|unique:users,Email',
            'MatKhau' => 'required|confirmed|min:6',
            'VaiTro' => 'required|in:VIEWER,ADMIN',
        ]);

        $user = User::create([
            'TenDangNhap' => $request->TenDangNhap,
            'Email' => $request->Email,
            'MatKhau' => $request->MatKhau, // Lưu mật khẩu dạng văn bản thô
            'VaiTro' => $request->VaiTro,
            'Diemtichluy' => 0,
        ]);

        Auth::login($user);

        // Chuyển hướng dựa trên vai trò
        if ($user->VaiTro === 'VIEWER') {
            return redirect()->route('articless.index');
        } elseif ($user->VaiTro === 'ADMIN') {
            return redirect()->route('dashboard'); // Sửa từ articles.index thành dashboard
        }

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function profile()
    {
        return view('profile');
    }
}