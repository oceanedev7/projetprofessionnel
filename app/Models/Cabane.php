<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabane extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomCabane',
        'description',
        'capacite',
        'prix',
       'disponibilite',
     ];

     public function equipements()
    {
        return $this->hasMany(Equipement::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
}
