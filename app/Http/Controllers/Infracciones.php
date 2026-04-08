<?php

namespace App\Http\Controllers;

use App\Models\Infraccion;
use Exception;
use Illuminate\Http\Request;

class Infracciones extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Infraccion::all();
        $titulo = 'Infracciones';
        return view('modules.infracciones.index', compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Registrar Infracción';
        return view('modules.infracciones.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'cedula' => 'required|unique:infracciones,cedula',
            'placa_vehiculo' => 'required|unique:infracciones,placa_vehiculo'
        ], [
            'cedula.unique' => 'La cédula ya está registrada.',
            'placa_vehiculo.unique' => 'La placa del vehículo ya está registrada.'
        ]);

        $data = $request->all();
        $data['documentos'] = $request->input('documentos', []);
        Infraccion::create($data);
        
        return to_route('infracciones.index')->with('success', 'Infracción registrada exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $titulo = 'Confirmar eliminación';
        $item = Infraccion::findOrFail($id);
        return view('modules.infracciones.show', compact('titulo', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $titulo = 'Editar Infracción';
        $item = Infraccion::findOrFail($id);
        return view('modules.infracciones.edit', compact('titulo', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cedula' => 'required|unique:infracciones,cedula,' . $id,
            'placa_vehiculo' => 'required|unique:infracciones,placa_vehiculo,' . $id
        ], [
            'cedula.unique' => 'La cédula ya está registrada.',
            'placa_vehiculo.unique' => 'La placa del vehículo ya está registrada.'
        ]);

        $item = Infraccion::findOrFail($id);
        $data = $request->all();
        $data['documentos'] = $request->input('documentos', []);
        $item->update($data);
        
        return to_route('infracciones.index')->with('update', 'Infracción actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Infraccion::findorFail($id);
        $item->delete();

        return to_route('infracciones.index')->with('delete', 'Infracción eliminada exitosamente.');
    }
}
