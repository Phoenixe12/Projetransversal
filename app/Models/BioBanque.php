<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioBanque extends Model
{
    use HasFactory;
    protected $table = 'biobanques';
    protected $fillable = [
        'nom',
        'adresseRue',
        'codePostal',
        'ville',
        'region',
        'pays',
        'latitude',
        'longitude',
        'etage',
        'etablissementHote',
        'contactNom',
        'contactFonction',
        'contactTelephone',
        'contactEmail',
        'horairesOuverture',
        'informationsAcces',
        'siteWeb',
        'informationsSupplementaires'
    ];
}
