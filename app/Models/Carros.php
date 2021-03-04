<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carros extends Model
{
    protected $table = 'veiculo';

    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'modelo',
        'data'
    ];

    //Padrão para API

    protected $casts = [
        'data' => 'Timestamp'
    ];

    public $timestamps = false ;
}
