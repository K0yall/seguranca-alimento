@extends('layouts.app')

@section('title', 'Resultado da Porção')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Valores Nutricionais da Porção</h1>
        <p class="text-gray-600 mt-2">Resultado do cálculo para {{ $peso }}g de {{ $alimento['nome'] }}</p>
    </div>

    <!-- Resumo da Porção -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl p-8 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h2 class="text-2xl font-bold mb-2">{{ $alimento['nome'] }}</h2>
                <p class="text-blue-100">Porção de {{ number_format($peso, 1) }}g</p>
            </div>
            <div class="mt-4 md:mt-0 text-right">
                <div class="text-3xl font-bold">{{ number_format($valores['calorias'], 1) }}</div>
                <div class="text-blue-100">Calorias (kcal)</div>
            </div>
        </div>
    </div>

    <!-- Macronutrientes -->
    <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Macronutrientes</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-50 p-6 rounded-lg text-center">
                <div class="text-3xl font-bold text-blue-600 mb-2">{{ number_format($valores['carboidratos'], 1) }}g</div>
                <div class="text-blue-700 font-medium">Carboidratos</div>
                <div class="text-sm text-blue-600 mt-1">
                    {{ number_format(($valores['carboidratos'] * 4 / $valores['calorias']) * 100, 1) }}% das calorias
                </div>
            </div>
            <div class="bg-green-50 p-6 rounded-lg text-center">
                <div class="text-3xl font-bold text-green-600 mb-2">{{ number_format($valores['proteinas'], 1) }}g</div>
                <div class="text-green-700 font-medium">Proteínas</div>
                <div class="text-sm text-green-600 mt-1">
                    {{ number_format(($valores['proteinas'] * 4 / $valores['calorias']) * 100, 1) }}% das calorias
                </div>
            </div>
            <div class="bg-yellow-50 p-6 rounded-lg text-center">
                <div class="text-3xl font-bold text-yellow-600 mb-2">{{ number_format($valores['gorduras_totais'], 1) }}g</div>
                <div class="text-yellow-700 font-medium">Gorduras Totais</div>
                <div class="text-sm text-yellow-600 mt-1">
                    {{ number_format(($valores['gorduras_totais'] * 9 / $valores['calorias']) * 100, 1) }}% das calorias
                </div>
            </div>
        </div>
    </div>

    <!-- Detalhes Nutricionais -->
    <div class="grid md:grid-cols-2 gap-8 mb-8">
        <!-- Gorduras Específicas -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Tipos de Gorduras</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-700">Gorduras Saturadas</span>
                    <span class="font-semibold text-gray-900">{{ number_format($valores['gorduras_saturadas'], 2) }}g</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-700">Gorduras Trans</span>
                    <span class="font-semibold text-gray-900">{{ number_format($valores['gorduras_trans'], 2) }}g</span>
                </div>
            </div>
        </div>

        <!-- Outros Nutrientes -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Outros Nutrientes</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-700">Fibras</span>
                    <span class="font-semibold text-gray-900">{{ number_format($valores['fibra'], 2) }}g</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-700">Açúcares</span>
                    <span class="font-semibold text-gray-900">{{ number_format($valores['acucares'], 2) }}g</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Minerais e Vitaminas -->
    <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Minerais e Vitaminas</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <div class="text-center">
                <div class="text-2xl font-bold text-purple-600 mb-1">{{ number_format($valores['sodio'], 1) }}</div>
                <div class="text-sm text-gray-700">Sódio (mg)</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-purple-600 mb-1">{{ number_format($valores['calcio'], 1) }}</div>
                <div class="text-sm text-gray-700">Cálcio (mg)</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-purple-600 mb-1">{{ number_format($valores['ferro'], 1) }}</div>
                <div class="text-sm text-gray-700">Ferro (mg)</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-purple-600 mb-1">{{ number_format($valores['potassio'], 1) }}</div>
                <div class="text-sm text-gray-700">Potássio (mg)</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-purple-600 mb-1">{{ number_format($valores['vitamina_c'], 1) }}</div>
                <div class="text-sm text-gray-700">Vitamina C (mg)</div>
            </div>
        </div>
    </div>

    <!-- Comparação com valores de referência -->
    <div class="bg-gray-50 rounded-xl p-8 mb-8">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Informação de Referência</h3>
        <p class="text-gray-700 mb-4">
            Estes valores foram calculados proporcionalmente baseados nos dados nutricionais de 1kg (1000g) do alimento.
        </p>
        <div class="text-sm text-gray-600">
            <strong>Fórmula:</strong> Valor da porção = (Valor por 1kg × Peso da porção) ÷ 1000g
        </div>
    </div>

    <!-- Ações -->
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('porcoes.create') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors text-center">
            Calcular Nova Porção
        </a>
        <a href="{{ route('alimentos.index') }}" class="bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-700 transition-colors text-center">
            Ver Alimentos
        </a>
        <button onclick="window.print()" class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
            Imprimir Resultado
        </button>
    </div>
</div>

<style>
@media print {
    nav, footer, .no-print { display: none !important; }
    body { background: white !important; }
    .bg-gradient-to-r { background: #3b82f6 !important; }
}
</style>
@endsection