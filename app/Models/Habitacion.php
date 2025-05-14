<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';
    protected $fillable = ['cantidad', 'hotel_id', 'tipo_habitacion_id', 'acomodacion_id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class);
    }

    public function acomodacion()
    {
        return $this->belongsTo(Acomodacion::class);
    }
}
