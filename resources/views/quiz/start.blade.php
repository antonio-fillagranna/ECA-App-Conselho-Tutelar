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
                    @if (isset($question) && $question)
                        @php
                            $currentQuestionIndex = Session::get('current_question_index', 0);
                            $totalQuestions = count(Session::get('quiz_questions', []));
                        @endphp
                        <h3 class="text-lg font-bold mb-4">Questão {{ $currentQuestionIndex + 1 }} de {{ $totalQuestions }}</h3>
                        <p class="mb-6 text-xl">{{ $question->text }}</p>

                        <form method="POST" action="{{ route('quiz.submit') }}">
                            @csrf
                            <input type="hidden" name="question_id" value="{{ $question->id }}">

                            <div class="space-y-4">
                                @foreach ($question->answers->shuffle() as $answer) {{-- embaralha as opções --}}
                                    <label class="block">
                                        <input type="radio" name="answer" value="{{ $answer->id }}" class="mr-2" required>
                                        {{ $answer->text }}
                                    </label>
                                @endforeach
                            </div>

                            <x-primary-button class="mt-6">
                                {{ __('Próxima Questão') }}
                            </x-primary-button>
                        </form>
                    @else
                        <p>O quiz foi concluído ou não há questões disponíveis. (Ou algo deu errado ao carregar a questão inicial)</p>
                        <a href="{{ route('quiz.result') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Ver Resultado</a>
                        <a href="{{ route('quiz.start') }}" class="mt-4 ml-2 inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Reiniciar Quiz</a>
                    @endif
                </div>
            </div>
        </div>
    </x-app-layout>