<?php

namespace App\Http\Controllers;

use App\Models\Acomodacion;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class AcomodacionController extends Controller
{
    public function index($hotelId)
    {
        $acomodaciones = Acomodacion::where('hotel_id', $hotelId)->get();

        if ($acomodaciones->isEmpty()) {
            return response()->json(['message' => 'No se encontraron acomodaciones para este hotel.'], 404);
        }

        return response()->json($acomodaciones);
    }

    public function show($id)
    {
        $acomodacion = Acomodacion::find($id);

        if (!$acomodacion) {
            return response()->json(['message' => 'Acomodación no encontrada.'], 404);
        }

        return response()->json($acomodacion);
    }

    public function store(Request $request, $hotelId)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $acomodacion = Acomodacion::create([
            'nombre' => $request->nombre,
            'hotel_id' => $hotelId,
        ]);

        return response()->json($acomodacion, 201);
    }

    public function update(Request $request, $hotelId, $id)
    {
        $acomodacion = Acomodacion::where('hotel_id', $hotelId)->where('id', $id)->first();

        // if (!$acomodacion) {
        //     return response()->json(['message' => 'Acomodación no encontrada para este hotel.'], 404);
        // }

        $request->validate([
            'nombre' => 'string|max:255',
            'hotel_id' => 'exists:hotels,id',
        ]);

        $acomodacion->update($request->all());

        return response()->json($acomodacion, 200); // Devuelve el modelo actualizado con un código de estado 200
    }

    public function destroy($hotelId, $id)
    {
        $acomodacion = Acomodacion::where('hotel_id', $hotelId)->where('id', $id)->first();

        // if (!$acomodacion) {
        //     return response()->json(['message' => 'Acomodación no encontrada para este hotel.'], 404);
        // }

        $acomodacion->delete();
        return response()->json(['message' => 'Acomodación eliminada correctamente.'], 204);
    }
}
