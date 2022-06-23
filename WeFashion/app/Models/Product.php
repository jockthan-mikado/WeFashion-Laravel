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
		'price',
        'visibility',
        'status',
        'category_id',
		'created_at',
		'updated_at',
	];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
    
    public function picture()
	{
		return $this->hasOne(Picture::class);
	}

}
