<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProductResource;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   //get-all function
         // Define discount percentages for silver and gold users,we can change variable using by admin panel
       $silver_percent_off = 0.1; // Example: 10% discount for silver users
       $gold_percent_off = 0.2;   // Example: 20% discount for gold users
       
        $userType = user::select('type')->get();

        $products = Product::all();
        foreach ($products as $product) {
        if($userType = 1){
            
            $product->price *= (1 - $silver_percent_off);         
        }  
        elseif($userType = 2){
            $product->price *= (1 - $gold_percent_off);        
        }
        else{
            $product->price=$price;       
        }
        }
        return $products;
    }

  
    public function store(Request $request)
    {
    // Define validation rules
  
    // Handle image upload
    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);

    // Store product
    $product = new Product;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->image = $imageName;
    $product->price = $request->price;
    $product->avatar = $request->avatar;
    $product->type = $request->type;
    $product->is_active = $request->is_active;

    // Add more fields as needed
    $product->save();

    return response()->json(['message' => 'Product stored successfully'], 200);
    }
    

    /**
     * Display the specified resource.
     */
   
     public function showbyslug(string $slug)
     {
         //get by id function
         //Define discount percentages for silver and gold users,we can change variable using by admin panel
       $silver_percent_off = 0.1; // Example: 10% discount for silver users
       $gold_percent_off = 0.2;   // Example: 20% discount for gold users
       
        $userType = user::select('type')->get();

        $product = Product::where('slug', $slug)->firstOrFail();
        
        
        if($userType = 1){
            
            $product->price *= (1 - $silver_percent_off);         
        }  
        elseif($userType = 2){
            $product->price *= (1 - $gold_percent_off);        
        }
        else{
            $product->price=$price;       
        }
        
        return response()->json($product);
     }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $product = Product::findOrFail($slug);
        $product->update($request->all());
        return response()->json(['message' => 'Product updated successfully',$product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $product = Product::findOrFail($slug);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
