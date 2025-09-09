@extends('layouts.app')

@section('title', 'Início - NutriApp')

@section('content')
<div class="text-center">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-600 to-blue-600 rounded-2xl text-white p-12 mb-12">
        <h1 class="text-4xl font-bold mb-4">Bem-vindo ao NutriApp</h1>
        <p class="text-xl opacity-90 mb-8 max-w-2xl mx-auto">
            Sua plataforma completa para registro de alimentos e cálculo de valores nutricionais. 
            Controle sua alimentação de forma simples e eficiente.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('alimentos.create') }}" class="bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                Cadastrar Alimento
            </a>
            <a href="{{ route('porcoes.create') }}" class="bg-green-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-400 transition-colors">
                Calcular Porção
            </a>
        </div>
    </div>

    <!-- Features Grid -->
    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <!-- Registro de Alimentos -->
        <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Registro de Alimentos</h3>
            <p class="text-gray-600 mb-6">
                Cadastre alimentos com todos os valores nutricionais baseados em 1kg. 
                Inclua calorias, macronutrientes, vitaminas e minerais.
            </p>
            <div class="space-y-2 text-left mb-6">
                <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Calorias, carboidratos, proteínas
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Gorduras, fibras, açúcares
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Vitaminas e minerais
                </div>
            </div>
            <a href="{{ route('alimentos.create') }}" class="inline-flex items-center text-green-600 font-semibold hover:text-green-700">
                Cadastrar Alimento
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Cálculo de Porções -->
        <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Cálculo de Porções</h3>
            <p class="text-gray-600 mb-6">
                Calcule automaticamente os valores nutricionais de qualquer porção. 
                Digite o peso em gramas e obtenha os valores proporcionais.
            </p>
            <div class="space-y-2 text-left mb-6">
                <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Cálculo automático proporcional
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Baseado em peso em gramas
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Resultados precisos e detalhados
                </div>
            </div>
            <a href="{{ route('porcoes.create') }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                Calcular Porção
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Como Funciona</h3>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-green-600 font-bold text-lg">1</span>
                </div>
                <h4 class="font-semibold text-gray-900 mb-2">Cadastre Alimentos</h4>
                <p class="text-gray-600 text-sm">Registre alimentos com valores nutricionais baseados em 1kg</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold text-lg">2</span>
                </div>
                <h4 class="font-semibold text-gray-900 mb-2">Informe o Peso</h4>
                <p class="text-gray-600 text-sm">Digite quantos gramas você consumiu do alimento</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-purple-600 font-bold text-lg">3</span>
                </div>
                <h4 class="font-semibold text-gray-900 mb-2">Obtenha os Valores</h4>
                <p class="text-gray-600 text-sm">Receba automaticamente os valores nutricionais da porção</p>
            </div>
        </div>
    </div>
</div>
@endsection