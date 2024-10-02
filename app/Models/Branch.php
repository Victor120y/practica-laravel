<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'marcas'; //nombre de la tabla
    protected $primarykey = 'codigo'; //Llave primaria de la tabla
    protected $fillable = ['nombre']; //Campos para asignación másiva
}
