<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'guest_id',
        'paiement_id',
        'nomCabane',
       'nombreAdultes',
        'nombreEnfants',
       'dateArrivee',
        'dateDepart',
        'nombreNuitees',
        'message',
        'prix',
     ];

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }

    public function paiement()
    {
        return $this->belongsTo(Paiement::class);
    }

    public function prestations()
    {
        return $this->belongsToMany(Prestation::class, 'reservation__prestations')
        ->withPivot('quantite');
    }

    public function cabane()
{
    return $this->belongsTo(Cabane::class);
}


}
