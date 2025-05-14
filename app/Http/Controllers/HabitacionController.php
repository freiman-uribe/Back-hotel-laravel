<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function index($hotelId)
    {
        $habitaciones = Habitacion::where('hotel_id', $hotelId)
            ->with(['tipoHabitacion.acomodaciones:id,nombre', 'acomodacion:id,nombre'])
            ->get();

        // if ($habitaciones->isEmpty()) {
        //     return response()->json(['message' => 'No se encontraron habitaciones para este hotel.'], 404);
        // }

        return response()->json($habitaciones);
    }

    public function show($hotelId, $id)
    {
        $habitacion = Habitacion::where('hotel_id', $hotelId)
            ->where('id', $id)
            ->with('tipoHabitacion.acomodaciones:id,nombre')
            ->first();

        if (!$habitacion) {
            return response()->json(['message' => 'Habitación no encontrada para este hotel.'], 404);
        }

        return response()->json($habitacion);
    }

    public function store(Request $request, $hotelId)
    {
        $request->validate([
            'cantidad' => 'required|integer',
            'tipo' => 'required|exists:tipo_habitaciones,id',
            'acomodacion' => 'required|exists:acomodacions,id',
        ]);

        $habitacion = Habitacion::create([
            'cantidad' => $request->cantidad,
            'hotel_id' => $hotelId,
            'tipo_habitacion_id' => $request->tipo,
            'acomodacion_id' => $request->acomodacion,
        ]);

        return response()->json($habitacion->load('acomodacion:id,nombre'), 201);
    }

    public function update(Request $request, $hotelId, $id)
    {
        $habitacion = Habitacion::where('hotel_id', $hotelId)
            ->where('id', $id)
            ->first();

        if (!$habitacion) {
            return response()->json(['message' => 'Habitación no encontrada para este hotel.'], 404);
        }

        $request->validate([
            'cantidad' => 'integer',
            'tipo' => 'exists:tipo_habitaciones,id',
            'acomodacion' => 'exists:acomodacions,id',
        ]);

        $habitacion->update([
            'cantidad' => $request->cantidad,
            'tipo_habitacion_id' => $request->tipo,
            'acomodacion_id' => $request->acomodacion,
        ]);

        return response()->json($habitacion->load('acomodacion:id,nombre', 'tipoHabitacion:id,nombre'));
    }

    public function destroy($hotelId, $id)
    {
        $habitacion = Habitacion::where('hotel_id', $hotelId)
            ->where('id', $id)
            ->first();

        if (!$habitacion) {
            return response()->json(['message' => 'Habitación no encontrada para este hotel.'], 404);
        }

        $habitacion->delete();
        return response()->json(['message' => 'Habitación eliminada correctamente.'], 204);
    }
}
