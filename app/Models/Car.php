<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'year',
        'type',
        'image_url',
        'created_at',
        'updated_at',

    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function garages()
    {
        return $this->belongsToMany(Garage::class); // many to many
    }
}
