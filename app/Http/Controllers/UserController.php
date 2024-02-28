<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   //get all function
        return User::all();
    }

   
    public function store(Request $request)
    { 
     // valiation , we can use Resource but not have alote validate
     $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       
    ]);
      // return error if not validaite
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
        // You can return errors in your preferred format or redirect back with errors
    }

    // Handle avatar upload
    $avatarName = time().'.'.$request->avatar->extension();  
    $request->avatar->move(public_path('avatars'), $avatarName);

    // Store user
    $user = new User;
    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->avatar = $avatarName;
    $user->type = $type;
    $user->is_active = $is_active;
  
    // Add more fields as needed
    $user->save();

    return response()->json(['message' => 'User stored successfully'], 200);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {    
        //get by id function
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json(['message' => 'user updated successfully',$user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Product deleted successfully',204]);
    }
}
