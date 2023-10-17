<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $guarded=[];
    protected $fillable = [

        'name',
        'description',
        'small_meal_price',
        'medium_meal_price',
        'large_meal_price',
        'category',
        'image',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }
}
