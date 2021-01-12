<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table="hotels";

    #One To Many (Inverse) , evey hotel belongs to a category
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    //every hotel has many rooms
    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
