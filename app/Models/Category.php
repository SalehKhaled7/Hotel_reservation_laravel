<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable=["id","title","image","status","action"];

    //One To Many , evey category has many hotels
    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
}
