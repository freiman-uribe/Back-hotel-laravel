<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacion;
use App\Models\Hotel;
use Illuminate\Http\Request;

class TipoHabitacionController extends Controller
{
    public function index($hotel_id)
    {
        $tipoHabitaciones = TipoHabitacion::where('hotel_id', $hotel_id)
            ->with('acomodaciones:id,nombre')
            ->get();

        // if ($tipoHabitaciones->isEmpty()) {
        //     return response()->json(['message' => 'No se encontraron tipos de habitación para este hotel.'], 404);
        // }

        return response()->json($tipoHabitaciones);
    }

    public function show($hotel_id, $id)
    {
        $tipoHabitacion = TipoHabitacion::with('acomodaciones:id,nombre')->findOrFail($id);

        return response()->json($tipoHabitacion);
    }

    public function store(Request $request, $hotel_id)
    {
        $hotel = Hotel::findOrFail($hotel_id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'acomodaciones' => 'required|array',
            'acomodaciones.*' => 'exists:acomodacions,id',
        ]);

        $tipoHabitacion = new TipoHabitacion([
            'nombre' => $request->nombre,
            'hotel_id' => $hotel_id,
        ]);

        $hotel->tipoHabitaciones()->save($tipoHabitacion);

        $tipoHabitacion->acomodaciones()->sync($request->acomodaciones);

        return response()->json($tipoHabitacion->load('acomodaciones:id,nombre'), 201);
    }

    public function update(Request $request, $hotelId, $id)
    {
        $tipoHabitacion = TipoHabitacion::where('hotel_id', $hotelId)->where('id', $id)->first();

        if (!$tipoHabitacion) {
            return response()->json(['message' => 'Tipo de habitación no encontrada para este hotel.'], 404);
        }

        $request->validate([
            'nombre' => 'string|max:255',
            'acomodaciones' => 'array',
            'acomodaciones.*' => 'exists:acomodacions,id',
        ]);

        $tipoHabitacion->update($request->only('nombre'));

        if ($request->has('acomodaciones')) {
            $tipoHabitacion->acomodaciones()->sync($request->acomodaciones);
        }

        return response()->json($tipoHabitacion->load('acomodaciones:id,nombre'));
    }

    public function destroy($hotelId, $id)
    {
        $tipoHabitacion = TipoHabitacion::where('hotel_id', $hotelId)->where('id', $id)->first();

        if (!$tipoHabitacion) {
            return response()->json(['message' => 'Tipo de habitación no encontrada para este hotel.'], 404);
        }

        $tipoHabitacion->delete();
        return response()->json(['message' => 'Tipo de habitación eliminada correctamente.'], 204);
    }
}
