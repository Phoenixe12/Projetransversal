<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationEntreprise extends Model
{
    use HasFactory;
    protected $fillable = [
        'idUser',
        'nomOrganisation',
        'emailOrganisation',
        'documentPdf',
        'nomPays',
        'codePays',
        'adresse',
        'telephone',
        'autorisation',
    ];
}
