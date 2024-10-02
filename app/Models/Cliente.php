<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes'; //nombre de la tabla
    protected $primaryKey = 'codigo'; //Llave primaria de la tabla
    protected $fillable = ['nombre', 'edad', 'categoria']; //Campos para asignación másiva
}
