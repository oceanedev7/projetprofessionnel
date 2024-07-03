<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomCabane',
       'nombreAdultes',
        'nombreEnfants',
       'dateArrivee',
        'dateDepart',
        'nombreNuitees',
        'prix',
     ];

     public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function paiement()
    {
        return $this->belongsTo(Paiement::class);
    }


}
