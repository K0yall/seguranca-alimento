@extends('layouts.app')

@section('title', 'Alimentos Cadastrados')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Alimentos Cadastrados</h1>
        <p class="text-gray-600 mt-2">Gerencie sua base de dados de alimentos</p>
    </div>
    <a href="{{ route('alimentos.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Novo Alimento
    </a>
</div>

@if($alimentos->isEmpty())
    <div class="bg-white rounded-xl shadow-lg p-12 text-center">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Nenhum alimento cadastrado</h3>
        <p class="text-gray-600 mb-8">Comece cadastrando seu primeiro alimento para começar a usar a plataforma.</p>
        <a href="{{ route('alimentos.create') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
            Cadastrar Primeiro Alimento
        </a>
    </div>
@else
    <div class="grid gap-6">
        @foreach($alimentos as $alimento)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $alimento->nome }}</h3>
                            <p class="text-sm text-gray-500">Valores por 1kg (1000g)</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('porcoes.create') }}?alimento={{ $alimento->id }}" class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-200 transition-colors">
                                Calcular Porção
                            </a>
                            <a href="{{ route('alimentos.edit', $alimento) }}" class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-yellow-200 transition-colors">
                                Editar
                            </a>
                            <form action="{{ route('alimentos.destroy', $alimento) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este alimento?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-100 text-red-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-200 transition-colors">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Macronutrientes -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-red-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-red-600">{{ number_format($alimento->calorias, 1) }}</div>
                            <div class="text-sm text-red-700">Calorias (kcal)</div>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600">{{ number_format($alimento->carboidratos, 1) }}g</div>
                            <div class="text-sm text-blue-700">Carboidratos</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-green-600">{{ number_format($alimento->proteinas, 1) }}g</div>
                            <div class="text-sm text-green-700">Proteínas</div>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <div class="text-2xl font-bold text-yellow-600">{{ number_format($alimento->gorduras_totais, 1) }}g</div>
                            <div class="text-sm text-yellow-700">Gorduras Totais</div>
                        </div>
                    </div>

                    <!-- Detalhes expandíveis -->
                    <details class="group">
                        <summary class="cursor-pointer text-gray-700 font-medium hover:text-gray-900 flex items-center">
                            <svg class="w-4 h-4 mr-2 transform group-open:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Ver todos os valores nutricionais
                        </summary>
                        <div class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Gorduras Saturadas:</span>
                                <span class="font-medium">{{ number_format($alimento->gorduras_saturadas, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Gorduras Trans:</span>
                                <span class="font-medium">{{ number_format($alimento->gorduras_trans, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Fibras:</span>
                                <span class="font-medium">{{ number_format($alimento->fibra, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Açúcares:</span>
                                <span class="font-medium">{{ number_format($alimento->acucares, 1) }}g</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Sódio:</span>
                                <span class="font-medium">{{ number_format($alimento->sodio, 1) }}mg</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Cálcio:</span>
                                <span class="font-medium">{{ number_format($alimento->calcio, 1) }}mg</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Ferro:</span>
                                <span class="font-medium">{{ number_format($alimento->ferro, 1) }}mg</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Potássio:</span>
                                <span class="font-medium">{{ number_format($alimento->potassio, 1) }}mg</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Vitamina C:</span>
                                <span class="font-medium">{{ number_format($alimento->vitamina_c, 1) }}mg</span>
                            </div>
                        </div>
                    </details>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 text-center">
        <p class="text-gray-600">
            Total de {{ $alimentos->count() }} alimento{{ $alimentos->count() !== 1 ? 's' : '' }} cadastrado{{ $alimentos->count() !== 1 ? 's' : '' }}
        </p>
    </div>
@endif
@endsection