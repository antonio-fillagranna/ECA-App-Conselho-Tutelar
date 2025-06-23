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
                    <h3 class="text-lg font-bold mb-4">Quiz Concluído!</h3>

                    <p class="mb-4 text-xl">Sua pontuação final: <span class="font-bold text-blue-600">{{ $finalScore }}</span> de <span class="font-bold">{{ $totalQuestions }}</span></p>

                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('quiz.start') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Jogar Novamente
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>