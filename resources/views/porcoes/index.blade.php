@extends('layouts.app')

@section('title', 'Histórico de Porções')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Histórico de Porções</h1>
        <p class="text-gray-600 mt-2">Veja todas as porções calculadas anteriormente</p>
    </div>
    <a href="{{ route('porcoes.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Nova Porção
    </a>
</div>

@if($porcoes->isEmpty())
    <div class="bg-white rounded-xl shadow-lg p-12 text-center">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Nenhuma porção calculada</h3>
        <p class="text-gray-600 mb-8">Comece calculando sua primeira porção para ver o histórico aqui.</p>
        <a href="{{ route('porcoes.create') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
            Calcular Primeira Porção
        </a>
    </div>
@else
    <div class="grid gap-6">
        @foreach($porcoes as $porcao)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $porcao->alimento->nome }}</h3>
                            <p class="text-sm text-gray-500">Porção de {{ number_format($porcao->peso, 1) }}g</p>
                            <p class="text-xs text-gray-400">{{ $porcao->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('porcoes.show', $porcao) }}" class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-200 transition-colors">
                                Ver Detalhes
                            </a>
                            <form action="{{ route('porcoes.destroy', $porcao) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir esta porção?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-100 text-red-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-200 transition-colors">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Valores calculados resumidos -->
                    @php
                        $fator = $porcao->peso / 1000;
                        $calorias = round($porcao->alimento->calorias * $fator, 2);
                        $carboidratos = round($porcao->alimento->carboidratos * $fator, 2);
                        $proteinas = round($porcao->alimento->proteinas * $fator, 2);
                        $gorduras = round($porcao->alimento->gorduras_totais * $fator, 2);
                    @endphp

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-red-50 p-4 rounded-lg text-center">
                            <div class="text-lg font-bold text-red-600">{{ number_format($calorias, 1) }}</div>
                            <div class="text-xs text-red-700">Calorias (kcal)</div>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg text-center">
                            <div class="text-lg font-bold text-blue-600">{{ number_format($carboidratos, 1) }}g</div>
                            <div class="text-xs text-blue-700">Carboidratos</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg text-center">
                            <div class="text-lg font-bold text-green-600">{{ number_format($proteinas, 1) }}g</div>
                            <div class="text-xs text-green-700">Proteínas</div>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg text-center">
                            <div class="text-lg font-bold text-yellow-600">{{ number_format($gorduras, 1) }}g</div>
                            <div class="text-xs text-yellow-700">Gorduras</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="mt-8">
        {{ $porcoes->links() }}
    </div>
@endif
@endsection