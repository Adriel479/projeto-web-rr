<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $fillable = ['nome_recurso','descricao_recurso','quantidade_recurso'];
    protected $guarded = ['id_recurso'];
    protected $table = 'recurso';
}
