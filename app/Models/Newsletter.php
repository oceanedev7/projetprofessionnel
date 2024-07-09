<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',  
      ];

      public function visiteurs()
    {
        return $this->hasMany(Visiteur::class);
    }
}
