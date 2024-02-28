<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'slug',
        'avatar',
        'type',
        'is_active',
    ];
    

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
