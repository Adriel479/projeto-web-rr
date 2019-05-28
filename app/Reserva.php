<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $primaryKey = 'id_reserva';
    protected $fillable = ['data_reserva','id_usuario','id_recurso', 'estado_reserva'];
    protected $guarded = ['id_reserva', 'created_at', 'update_at'];
    protected $table = 'reservas';
}
