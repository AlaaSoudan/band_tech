<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{   // register function
    public function register(Request $request)
{    
    //
    /*validatior for name ,email and password , we can add validation to resource file and used here 
     but the register not a lot  */
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',

    ]); 

  /*   if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    } */
   // add user to DataBase
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      
    ]); //about type and active they should admin add it
   
    $token = $user->createToken('MyApp')->plainTextToken;
   //return response to success procceess
    return response()->json(['token' => $token], 201);
}

}
