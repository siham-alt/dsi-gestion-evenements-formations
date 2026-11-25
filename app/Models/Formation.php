<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'description', 
        'date_debut', 
        'date_fin', 
        'nb_places', 
        'image'
    ];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
