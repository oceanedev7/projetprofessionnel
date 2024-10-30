<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;


    protected $fillable = [
        'moyenPaiement',
        'montant',
        'statutPaiement',
        'description',
     ];


     public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
