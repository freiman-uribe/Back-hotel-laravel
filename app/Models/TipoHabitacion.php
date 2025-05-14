<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoHabitacion extends Model
{
    use HasFactory;

    protected $table = 'tipo_habitaciones'; // Especifica el nombre correcto de la tabla

    protected $fillable = [
        'nombre',
        'hotel_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function acomodaciones()
    {
        return $this->belongsToMany(Acomodacion::class, 'tipo_habitacion_acomodacion');
    }
}
