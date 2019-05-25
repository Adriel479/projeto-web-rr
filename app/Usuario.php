<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['nome_usuario','login_usuario','senha_usuario','tipo_usuario'];
    protected $guarded = ['id_usuario', 'created_at', 'update_at'];
    protected $table = 'usuarios';
}
