<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
public function createUser(Request $request)
{
$validatedData = $request->validate([
'name' => 'required|string|max:255',
'email' => 'required|string|email|max:255|unique:users',
'password' => 'required|string|confirmed|min:8',
]);

$user = User::create([
'name' => $validatedData['name'],
'email' => $validatedData['email'],
'password' => Hash::make($validatedData['password']),
]);

$token = $user->createToken('auth_token')->plainTextToken;

return view('login');
}

public function login(Request $request)
{
$request->validate([
'email' => 'required|string|email',
'password' => 'required|string',
]);

$user = User::where('email', $request->email)->first();

if (!$user || !Hash::check($request->password, $user->password)) {
throw ValidationException::withMessages([
'email' => __('auth.failed'),
]);
}

$token = $user->createToken('auth_token')->plainTextToken;

return view('paint-calculator', ['token' => $token]);
}

public function logout(Request $request)
{
$request->user()->tokens()->delete();

return response()->json([
'message' => 'Successfully logged out'
]);
}
}

