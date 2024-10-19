<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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
        return $this->belongsTo(User::class);
    }

    public function paiement()
    {
        return $this->belongsTo(Paiement::class);
    }

    public function prestations()
    {
        return $this->hasMany(Prestation::class);
    }

    public function cabanes()
    {
        return $this->belongsToMany(Cabane::class, 'reservation_cabanes', 'reservation_id', 'cabane_id')
                    ->withPivot('dateArrivee', 'dateDepart'); // Ajouter les colonnes si nécessaire
    }

}
