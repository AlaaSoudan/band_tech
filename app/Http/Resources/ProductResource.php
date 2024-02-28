<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Validator;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'price' => 'required|numeric',
                // Add more validation rules as needed
            ]);
        
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
                // You can return errors in your preferred format or redirect back with errors
            }
        }
    }
}
