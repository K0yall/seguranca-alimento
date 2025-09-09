@extends('layouts.app')

@section('title', 'Calcular Porção')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Calcular Porção</h1>
        <p class="text-gray-600 mt-2">Selecione um alimento e informe o peso para calcular os valores nutricionais</p>
    </div>

    @if(empty($alimentos))
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Nenhum alimento cadastrado</h3>
            <p class="text-gray-600 mb-8">Você precisa cadastrar pelo menos um alimento antes de calcular porções.</p>
            <a href="{{ route('alimentos.create') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                Cadastrar Alimento
            </a>
        </div>
    @else
        <form action="{{ route('porcoes.store') }}" method="POST" class="bg-white rounded-xl shadow-lg p-8">
            @csrf
            
            <div class="mb-6">
                <label for="id_alimento" class="block text-sm font-medium text-gray-700 mb-2">Selecione o Alimento *</label>
                <select id="id_alimento" name="id_alimento" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Escolha um alimento...</option>
                    @foreach($alimentos as $alimento)
                        <option value="{{ $alimento['id'] }}" {{ old('id_alimento') == $alimento['id'] ? 'selected' : '' }}>
                            {{ $alimento['nome'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-8">
                <label for="peso" class="block text-sm font-medium text-gray-700 mb-2">Peso da Porção (gramas) *</label>
                <div class="relative">
                    <input type="number" step="0.01" min="0.01" id="peso" name="peso" value="{{ old('peso') }}" required
                           class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Ex: 100">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <span class="text-gray-500 text-sm">g</span>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-2">Informe o peso em gramas da porção que você consumiu</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('home') }}" class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-center">
                    Voltar
                </a>
                <button type="submit" class="flex-1 bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Calcular Valores
                </button>
            </div>
        </form>

        <!-- Dica -->
        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h4 class="font-semibold text-blue-900 mb-2">Como funciona o cálculo?</h4>
                    <p class="text-blue-800 text-sm">
                        Os valores nutricionais são calculados proporcionalmente. Por exemplo, se um alimento tem 100 kcal por 1kg (1000g), 
                        uma porção de 100g terá 10 kcal. O sistema faz esse cálculo automaticamente para todos os nutrientes.
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection