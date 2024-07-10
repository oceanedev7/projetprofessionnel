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
        'prix',
        'description',
        ];
    
    
        public function reservation()
        {
            return $this->belongsTo(Reservation::class);
        }
    
    
        public function categorie()
        {
            return $this->belongsTo(Categorie::class);
        }
}
