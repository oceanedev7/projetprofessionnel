<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'categorie_id',
        'type',
        'duree',
        'prix_adulte',
        'prix_enfant',
        'description',
        ];
    
    
        public function reservations()
        {
            return $this->belongsToMany(Reservation::class, 'reservation__prestations')
                    ->withPivot('quantite');
        }
    
    
        public function categorie()
        {
            return $this->belongsTo(Categorie::class);
        }
}
