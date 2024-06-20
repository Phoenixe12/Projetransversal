<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PqsswordResetOpt extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'opt', 
        'created_at'
    ];


}
