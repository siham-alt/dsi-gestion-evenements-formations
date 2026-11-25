<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscriptionEv extends Model
{
    use HasFactory; 
     protected $fillable = [
        'evenement_id',
        'user_id',
        'nom',
        'email',
        'date_inscription',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
