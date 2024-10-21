<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'telephone',
        'email',
       'adresse_postale',
       'code_postal',
        'ville',
        'message',
        
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
