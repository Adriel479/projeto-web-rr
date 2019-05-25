<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ['data_reserva','id_usuario','id_recurso'];
    protected $guarded = ['id_reserva', 'created_at', 'update_at'];
    protected $table = 'reservas';
}
