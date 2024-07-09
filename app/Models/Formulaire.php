<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'numeroTelephone',
        'email',
        'message',
      ];

      public function visiteur()
      {
          return $this->belongsTo(Visiteur::class);
      }
}