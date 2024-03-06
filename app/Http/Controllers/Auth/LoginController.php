<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller
{   //login fanction 
    public function login(Request $request)
{     //if email or password not auth return 401 error
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    //if is correct return response we can continue to the profile page or home page
    $user = Auth::user();
    $token = $user->createToken('MyApp')->plainTextToken;

    return response()->json(['token' => $token], 200);
}

}
