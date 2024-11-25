<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'address'];

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
