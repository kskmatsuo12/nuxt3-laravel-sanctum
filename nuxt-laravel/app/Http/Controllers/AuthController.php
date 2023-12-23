<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $json = [
            'data' => $user
        ];
        return response()->json( $json, Response::HTTP_OK);
    }

    // ログイン
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // 認証が成功した場合の処理
        if (Auth::attempt($credentials)) {
            // セッションIDの再生成
            $request->session()->regenerate();
            return response()->json(['message' => 'ログイン成功']);
        }
    }
}
