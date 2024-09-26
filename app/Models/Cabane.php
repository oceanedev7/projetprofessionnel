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
        return $this->belongsToMany(Reservation::class, 'reservation_cabanes', 'cabane_id', 'reservation_id')
                    ->withPivot('dateArrivee', 'dateDepart'); // Ajouter les colonnes si nécessaire
    }
}
