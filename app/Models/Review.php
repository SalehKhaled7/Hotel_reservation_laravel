<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'hotel_id',
        'rate',
        'subject',
        'review',
        'ip',
    ];
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
