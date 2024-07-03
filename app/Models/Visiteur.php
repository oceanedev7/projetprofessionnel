<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;

   
    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }
}
