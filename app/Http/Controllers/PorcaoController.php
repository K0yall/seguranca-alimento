<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PorcaoController extends Controller
{
    private function readAllAlimentos()
    {
        return json_decode(Storage::get('alimentos.json', '[]'), true);
    }

    public function create()
    {
        $alimentos = $this->readAllAlimentos();
        return view('porcoes.create', compact('alimentos'));
    }

    public function store(Request $request)
    {
        $alimentos = $this->readAllAlimentos();
        $alimento = collect($alimentos)->firstWhere('id', (int) $request->id_alimento);

        if (!$alimento) {
            return back()->withErrors(['id_alimento' => 'Alimento não encontrado']);
        }

        $peso = (float) $request->peso;
        $fator = $peso / 1000; // proporção

        // calcula valores
        $nutrientes = collect($alimento)->except(['id', 'nome'])
            ->map(fn($v) => round($v * $fator, 2));

        return view('porcoes.show', [
            'alimento' => $alimento,
            'peso' => $peso,
            'valores' => $nutrientes
        ]);
    }
}
