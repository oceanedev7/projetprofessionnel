<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_Prestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'reservation_id',
        'prestation_id',
     ];
}
