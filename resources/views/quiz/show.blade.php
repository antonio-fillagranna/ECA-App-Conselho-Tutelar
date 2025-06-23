<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz do ECA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($question)
                        <h3 class="text-lg font-bold mb-4">
                            Pergunta {{ $currentIndex + 1 }} de {{ count($questionIds) }}:
                        </h3>
                        <p class="mb-6 text-xl">{{ $question->text }}</p>

                        {{-- Mensagens de Erro de Validação (se existirem) --}}
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('quiz.submit') }}">
                            @csrf

                            @foreach ($shuffledAnswers as $answer)
                                <div class="mb-4">
                                    <input type="radio" id="answer_{{ $answer->id }}" name="answer" value="{{ $answer->id }}" class="mr-2">
                                    <label for="answer_{{ $answer->id }}" class="text-lg">{{ $answer->text }}</label>
                                </div>
                            @endforeach

                            <div class="flex items-center justify-end mt-6">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Responder
                                </button>
                            </div>
                        </form>
                    @else
                        <p>Nenhuma pergunta encontrada para o quiz.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>