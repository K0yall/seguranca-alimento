<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Models\Porcao;
use Illuminate\Http\Request;

class PorcaoController extends Controller
{
    public function index()
    {
        $porcoes = Porcao::with('alimento')->orderBy('created_at', 'desc')->paginate(10);
        return view('porcoes.index', compact('porcoes'));
    }

    public function create()
    {
        $alimentos = Alimento::orderBy('nome')->get();
        return view('porcoes.create', compact('alimentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alimento_id' => 'required|exists:alimentos,id',
            'peso' => 'required|numeric|min:0.01'
        ]);

        $alimento = Alimento::findOrFail($request->alimento_id);
        $peso = $request->peso;

        // Calcular valores proporcionais
        $fator = $peso / 1000; // proporção baseada em 1kg = 1000g

        $valoresCalculados = [
            'calorias' => round($alimento->calorias * $fator, 2),
            'carboidratos' => round($alimento->carboidratos * $fator, 2),
            'proteinas' => round($alimento->proteinas * $fator, 2),
            'gorduras_totais' => round($alimento->gorduras_totais * $fator, 2),
            'gorduras_saturadas' => round($alimento->gorduras_saturadas * $fator, 2),
            'gorduras_trans' => round($alimento->gorduras_trans * $fator, 2),
            'fibra' => round($alimento->fibra * $fator, 2),
            'acucares' => round($alimento->acucares * $fator, 2),
            'sodio' => round($alimento->sodio * $fator, 2),
            'calcio' => round($alimento->calcio * $fator, 2),
            'ferro' => round($alimento->ferro * $fator, 2),
            'potassio' => round($alimento->potassio * $fator, 2),
            'vitamina_c' => round($alimento->vitamina_c * $fator, 2),
        ];

        // Salvar a porção no banco
        Porcao::create([
            'alimento_id' => $request->alimento_id,
            'peso' => $peso
        ]);

        return view('porcoes.resultado', [
            'alimento' => $alimento,
            'peso' => $peso,
            'valores' => $valoresCalculados
        ]);
    }

    public function show(Porcao $porcao)
    {
        $porcao->load('alimento');
        
        // Recalcular valores
        $fator = $porcao->peso / 1000;
        $alimento = $porcao->alimento;

        $valoresCalculados = [
            'calorias' => round($alimento->calorias * $fator, 2),
            'carboidratos' => round($alimento->carboidratos * $fator, 2),
            'proteinas' => round($alimento->proteinas * $fator, 2),
            'gorduras_totais' => round($alimento->gorduras_totais * $fator, 2),
            'gorduras_saturadas' => round($alimento->gorduras_saturadas * $fator, 2),
            'gorduras_trans' => round($alimento->gorduras_trans * $fator, 2),
            'fibra' => round($alimento->fibra * $fator, 2),
            'acucares' => round($alimento->acucares * $fator, 2),
            'sodio' => round($alimento->sodio * $fator, 2),
            'calcio' => round($alimento->calcio * $fator, 2),
            'ferro' => round($alimento->ferro * $fator, 2),
            'potassio' => round($alimento->potassio * $fator, 2),
            'vitamina_c' => round($alimento->vitamina_c * $fator, 2),
        ];

        return view('porcoes.resultado', [
            'alimento' => $alimento,
            'peso' => $porcao->peso,
            'valores' => $valoresCalculados
        ]);
    }

    public function destroy(Porcao $porcao)
    {
        $porcao->delete();

        return redirect()->route('porcoes.index')
            ->with('success', 'Porção excluída com sucesso!');
    }
}