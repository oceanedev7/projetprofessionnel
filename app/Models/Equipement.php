<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;

    protected $fillable = [
       'nomEquipement',
        'categorie',
     ];

     
     public function cabane()
    {
        return $this->belongsTo(Cabane::class);
    }
}
