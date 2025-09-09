@extends('layouts.app')

@section('title', 'Cadastrar Alimento')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Cadastrar Novo Alimento</h1>
        <p class="text-gray-600 mt-2">Informe os valores nutricionais baseados em 1kg (1000g) do alimento</p>
    </div>

    <form action="{{ route('alimentos.store') }}" method="POST" class="bg-white rounded-xl shadow-lg p-8">
        @csrf
        
        <!-- Nome do Alimento -->
        <div class="mb-8">
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">Nome do Alimento *</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"
                   placeholder="Ex: Arroz branco cozido">
        </div>

        <!-- Macronutrientes -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-2">
                    <div class="w-3 h-3 bg-green-600 rounded-full"></div>
                </div>
                Macronutrientes
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="calorias" class="block text-sm font-medium text-gray-700 mb-2">Calorias (kcal)</label>
                    <input type="number" step="0.01" id="calorias" name="calorias" value="{{ old('calorias', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="carboidratos" class="block text-sm font-medium text-gray-700 mb-2">Carboidratos (g)</label>
                    <input type="number" step="0.01" id="carboidratos" name="carboidratos" value="{{ old('carboidratos', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="proteinas" class="block text-sm font-medium text-gray-700 mb-2">Proteínas (g)</label>
                    <input type="number" step="0.01" id="proteinas" name="proteinas" value="{{ old('proteinas', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="gorduras_totais" class="block text-sm font-medium text-gray-700 mb-2">Gorduras Totais (g)</label>
                    <input type="number" step="0.01" id="gorduras_totais" name="gorduras_totais" value="{{ old('gorduras_totais', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
        </div>

        <!-- Gorduras Específicas -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <div class="w-6 h-6 bg-yellow-100 rounded-full flex items-center justify-center mr-2">
                    <div class="w-3 h-3 bg-yellow-600 rounded-full"></div>
                </div>
                Tipos de Gorduras
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="gorduras_saturadas" class="block text-sm font-medium text-gray-700 mb-2">Gorduras Saturadas (g)</label>
                    <input type="number" step="0.01" id="gorduras_saturadas" name="gorduras_saturadas" value="{{ old('gorduras_saturadas', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="gorduras_trans" class="block text-sm font-medium text-gray-700 mb-2">Gorduras Trans (g)</label>
                    <input type="number" step="0.01" id="gorduras_trans" name="gorduras_trans" value="{{ old('gorduras_trans', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
        </div>

        <!-- Outros Nutrientes -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                    <div class="w-3 h-3 bg-blue-600 rounded-full"></div>
                </div>
                Outros Nutrientes
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="fibra" class="block text-sm font-medium text-gray-700 mb-2">Fibras (g)</label>
                    <input type="number" step="0.01" id="fibra" name="fibra" value="{{ old('fibra', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="acucares" class="block text-sm font-medium text-gray-700 mb-2">Açúcares (g)</label>
                    <input type="number" step="0.01" id="acucares" name="acucares" value="{{ old('acucares', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
        </div>

        <!-- Minerais e Vitaminas -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center mr-2">
                    <div class="w-3 h-3 bg-purple-600 rounded-full"></div>
                </div>
                Minerais e Vitaminas
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label for="sodio" class="block text-sm font-medium text-gray-700 mb-2">Sódio (mg)</label>
                    <input type="number" step="0.01" id="sodio" name="sodio" value="{{ old('sodio', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="calcio" class="block text-sm font-medium text-gray-700 mb-2">Cálcio (mg)</label>
                    <input type="number" step="0.01" id="calcio" name="calcio" value="{{ old('calcio', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="ferro" class="block text-sm font-medium text-gray-700 mb-2">Ferro (mg)</label>
                    <input type="number" step="0.01" id="ferro" name="ferro" value="{{ old('ferro', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="potassio" class="block text-sm font-medium text-gray-700 mb-2">Potássio (mg)</label>
                    <input type="number" step="0.01" id="potassio" name="potassio" value="{{ old('potassio', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="vitamina_c" class="block text-sm font-medium text-gray-700 mb-2">Vitamina C (mg)</label>
                    <input type="number" step="0.01" id="vitamina_c" name="vitamina_c" value="{{ old('vitamina_c', 0) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
        </div>

        <!-- Botões -->
        <div class="flex flex-col sm:flex-row gap-4 justify-end">
            <a href="{{ route('alimentos.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-center">
                Cancelar
            </a>
            <button type="submit" class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                Cadastrar Alimento
            </button>
        </div>
    </form>
</div>
@endsection