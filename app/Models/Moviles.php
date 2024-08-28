<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moviles extends Model
{
    use HasFactory;

    protected $table = "automoviles";
    protected $primaryKey = 'Auto_id';

    protected $fillable = [
        'Auto_Name',
        'Auto_Modelo',
        'Auto_Marca',
        'Auto_Pais'
    ];

}
