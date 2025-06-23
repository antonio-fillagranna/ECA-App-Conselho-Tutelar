<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function start()
    {
        // Pega todas as perguntas
        $allQuestions = Question::with('answers')->get();

        // Embaralha as perguntas para garantir uma ordem aleatória a cada novo quiz
        $shuffledQuestions = $allQuestions->shuffle();

        // Armazena as IDs das perguntas embaralhadas na sessão
        Session::put('quiz_questions', $shuffledQuestions->pluck('id')->toArray());
        Session::put('current_question_index', 0); // Começa na primeira pergunta
        Session::put('score', 0); // Zera a pontuação

        return $this->showQuestion();
    }

    public function showQuestion()
    {
        $questionIds = Session::get('quiz_questions');
        $currentIndex = Session::get('current_question_index');

        // Se não houver perguntas ou o índice for inválido, redireciona para o final
        if (!$questionIds || $currentIndex >= count($questionIds)) {
            return redirect()->route('quiz.result');
        }

        $questionId = $questionIds[$currentIndex];
        $question = Question::with('answers')->find($questionId);

        if (!$question) {
            // Se a pergunta não for encontrada (erro), redireciona também
            return redirect()->route('quiz.result');
        }

        // Embaralha as respostas para cada pergunta
        $shuffledAnswers = $question->answers->shuffle();

        return view('quiz.show', compact('question', 'shuffledAnswers', 'currentIndex', 'questionIds'));
    }

    public function submitAnswer(Request $request)
    {
        $questionIds = Session::get('quiz_questions');
        $currentIndex = Session::get('current_question_index');
        $score = Session::get('score');

        // Verifica se a pergunta atual é válida
        if (!$questionIds || $currentIndex >= count($questionIds)) {
            return redirect()->route('quiz.result');
        }

        $questionId = $questionIds[$currentIndex];
        $question = Question::with('answers')->find($questionId);

        if (!$question) {
            return redirect()->route('quiz.result');
        }

        // Valida se uma resposta foi selecionada
        $request->validate([
            'answer' => 'required|exists:answers,id', // 'answer' deve ser o ID de uma resposta existente na tabela 'answers'
        ]);

        $selectedAnswerId = $request->input('answer');
        $selectedAnswer = $question->answers->find($selectedAnswerId);

        // Verifica se a resposta selecionada é a correta
        if ($selectedAnswer && $selectedAnswer->is_correct) {
            $score++;
            Session::put('score', $score); // Atualiza a pontuação na sessão
        }

        // Avança para a próxima pergunta
        Session::put('current_question_index', $currentIndex + 1);

        return $this->showQuestion(); // Exibe a próxima pergunta ou o resultado
    }

    public function result()
    {
        $finalScore = Session::get('score', 0);
        $totalQuestions = count(Session::get('quiz_questions', []));

        // Limpa as sessões do quiz para um novo jogo
        Session::forget(['quiz_questions', 'current_question_index', 'score']);

        return view('quiz.result', compact('finalScore', 'totalQuestions'));
    }
}
