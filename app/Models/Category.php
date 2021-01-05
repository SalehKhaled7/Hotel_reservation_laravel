<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable=["id","title","image","status","action"];

    protected $appends = [
        'parent'
        ];

    //One To Many , evey category has many hotels
    public function hotels(){
        return $this->hasMany(Hotel::class);
    }

    #each category may hasMany sub-categories
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }

    #each category may belong to parent category
    public function child(){
        return $this->hasMany(Category::class,'parent_id');
    }
}
