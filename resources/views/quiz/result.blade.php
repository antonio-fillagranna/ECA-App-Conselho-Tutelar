<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resultado do Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Parabéns! Você concluiu o Quiz do ECA.</h3>
                    <p class="mb-4 text-xl">Sua pontuação final: <span class="font-bold">{{ $score }}</span> de <span class="font-bold">{{ $totalQuestions }}</span> questões.</p>

                    <a href="{{ route('quiz.start') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Reiniciar Quiz</a>
                    <a href="{{ route('about') }}" class="mt-4 ml-2 inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Voltar para Sobre</a>
                </div>
            </div>
        </div>
    </x-app-layout>