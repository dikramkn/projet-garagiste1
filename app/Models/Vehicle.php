<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'clientID');
    }

    protected $fillable = [
        'make', 'model', 'fuelType', 'registration', 'photos', 'clientID',
    ];
}
