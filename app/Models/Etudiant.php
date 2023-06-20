<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [       
        'adresse',
        'phone',       
        'date_de_naissance',
        'ville_id'
    ];

    public function etudiantHasVille(){
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }

    // Établir une relation dépendante entre chaque étudiant et user
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

}
