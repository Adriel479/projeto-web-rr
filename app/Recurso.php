<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $primaryKey = 'id_recurso';
    protected $fillable = ['nome_recurso','descricao_recurso'];
    protected $guarded = ['id_recurso', 'created_at', 'update_at'];
    protected $table = 'recursos';
}
