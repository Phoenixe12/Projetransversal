<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echantillon extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'numeroIdentification',
        'datePrelevement',
        'nomPatient',
        'typeEchantillon',
        'quantiteVolume',
        'methodePrelevement',
        'conditionsPrelevement',
        'nomPreleveur',
        'qualificationsPreleveur',
        'temperatureConservation',
        'tempsTransport',
        'traitementPrealable',
        'contexteClinique',
        'traitementsEnCours',
        'antecedentsMedicaux',
        'analysesDemandees',
        'prioriteUrgence',
    ];
}
