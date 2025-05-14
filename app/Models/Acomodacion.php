<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acomodacion extends Model
{
    
    protected $fillable = [
        'nombre',
        'hotel_id',
    ];

    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class);
    }

    public function tipoHabitaciones()
    {
        return $this->belongsToMany(TipoHabitacion::class, 'tipo_habitacion_acomodacion');
    }
}
