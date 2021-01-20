<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    //evey room belongs to a hotel
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    //evey room has many images
    public function images(){
        return $this->hasMany(Image::class);
    }
    //evey room has many images
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
