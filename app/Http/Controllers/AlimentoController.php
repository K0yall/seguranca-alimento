<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    public function index()
    {
        $alimentos = Alimento::orderBy('nome')->get();
        return view('alimentos.index', compact('alimentos'));
    }

    public function create()
    {
        return view('alimentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100|unique:alimentos',
            'calorias' => 'nullable|numeric|min:0',
            'carboidratos' => 'nullable|numeric|min:0',
            'proteinas' => 'nullable|numeric|min:0',
            'gorduras_totais' => 'nullable|numeric|min:0',
            'gorduras_saturadas' => 'nullable|numeric|min:0',
            'gorduras_trans' => 'nullable|numeric|min:0',
            'fibra' => 'nullable|numeric|min:0',
            'acucares' => 'nullable|numeric|min:0',
            'sodio' => 'nullable|numeric|min:0',
            'calcio' => 'nullable|numeric|min:0',
            'ferro' => 'nullable|numeric|min:0',
            'potassio' => 'nullable|numeric|min:0',
            'vitamina_c' => 'nullable|numeric|min:0',
        ]);

        Alimento::create($request->all());

        return redirect()->route('alimentos.index')
            ->with('success', 'Alimento cadastrado com sucesso!');
    }

    public function show(Alimento $alimento)
    {
        return view('alimentos.show', compact('alimento'));
    }

    public function edit(Alimento $alimento)
    {
        return view('alimentos.edit', compact('alimento'));
    }

    public function update(Request $request, Alimento $alimento)
    {
        $request->validate([
            'nome' => 'required|string|max:100|unique:alimentos,nome,' . $alimento->id,
            'calorias' => 'nullable|numeric|min:0',
            'carboidratos' => 'nullable|numeric|min:0',
            'proteinas' => 'nullable|numeric|min:0',
            'gorduras_totais' => 'nullable|numeric|min:0',
            'gorduras_saturadas' => 'nullable|numeric|min:0',
            'gorduras_trans' => 'nullable|numeric|min:0',
            'fibra' => 'nullable|numeric|min:0',
            'acucares' => 'nullable|numeric|min:0',
            'sodio' => 'nullable|numeric|min:0',
            'calcio' => 'nullable|numeric|min:0',
            'ferro' => 'nullable|numeric|min:0',
            'potassio' => 'nullable|numeric|min:0',
            'vitamina_c' => 'nullable|numeric|min:0',
        ]);

        $alimento->update($request->all());

        return redirect()->route('alimentos.index')
            ->with('success', 'Alimento atualizado com sucesso!');
    }

    public function destroy(Alimento $alimento)
    {
        $alimento->delete();

        return redirect()->route('alimentos.index')
            ->with('success', 'Alimento excluído com sucesso!');
    }
}