<?php
namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with([
            'habitaciones.tipoHabitacion.acomodaciones:id,nombre',
        ])->get();

        return response()->json($hotels);
    }

    public function show($id)
    {
        $hotel = Hotel::with([
            'habitaciones.tipoHabitacion.acomodaciones:id,nombre',
        ])->findOrFail($id);

        return response()->json($hotel);
    }

    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'nit' => 'required|numeric|unique:hotels,nit',
            'numero_de_habitaciones' => 'required|integer',
        ]);

        $hotel = Hotel::create($request->all());
        return response()->json($hotel, 201);
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $request->validate([
            'nombre' => 'string|max:255',
            'direccion' => 'string|max:255',
            'ciudad' => 'string|max:255',
            'nit' => 'numeric|unique:hotels,nit,' . $id,
            'numero_de_habitaciones' => 'integer',
        ]);

        $hotel->update($request->all());
        return response()->json($hotel);
    }

    public function destroy($id)
    {
        Hotel::destroy($id);
        return response()->json(null, 204);
    }
}
