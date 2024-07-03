<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'numeroTelephone',
        'email',
        'message',
      ];

      public function visiteurs()
    {
        return $this->hasMany(Visiteur::class);
    }
}
