<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rede extends Model
{
    //chamada para o banco de dados o ideal é fazermos isso sempre
    protected $table = 'redes';

    protected $fillable = [
        'nome',
        'link',
    ];
}
