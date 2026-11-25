<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
         'nb_places', 
        'image'
    ];
    public function inscription_evs()
    {
        return $this->hasMany(InscriptionEv::class);
    }
}
