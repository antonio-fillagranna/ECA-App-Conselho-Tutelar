<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function start()
    {
        // Pega 10 questões aleatórias do banco de dados, COM SUAS RESPOSTAS
        $questions = Question::with('answers')->inRandomOrder()->limit(10)->get();

        // Mapeia as questões para armazenar na sessão (apenas ID da questão e ID da resposta correta)
        $quizQuestions = [];
        foreach ($questions as $question) {
            $correctAnswer = $question->answers->where('is_correct', true)->first();
            if ($correctAnswer) {
                $quizQuestions[$question->id] = $correctAnswer->id; // Armazena ID da questão => ID da resposta correta
            }
        }

        Session::put('quiz_questions', $quizQuestions);
        Session::put('current_question_ids', $questions->pluck('id')->toArray()); // Guardar a ordem das IDs
        Session::put('current_question_index', 0);
        Session::put('score', 0);

        // Pega a primeira questão para exibir
        $currentQuestionId = Session::get('current_question_ids')[0];
        $currentQuestion = Question::with('answers')->find($currentQuestionId);

        return view('quiz.start', ['question' => $currentQuestion]);
    }

    public function submitAnswer(Request $request)
    {
        $selectedAnswerId = (int) $request->input('answer'); // ID da resposta selecionada
        $questionId = (int) $request->input('question_id'); // ID da questão respondida

        $quizQuestions = Session::get('quiz_questions'); // IDs das questões e suas respostas corretas
        $currentQuestionIds = Session::get('current_question_ids'); // Ordem das IDs no quiz
        $currentQuestionIndex = Session::get('current_question_index');

        $correctAnswerIdForThisQuestion = $quizQuestions[$questionId] ?? null;

        $currentScore = Session::get('score', 0);

        if ($selectedAnswerId === $correctAnswerIdForThisQuestion) {
            $currentScore++;
            Session::put('score', $currentScore);
        }

        $currentQuestionIndex++;
        Session::put('current_question_index', $currentQuestionIndex);

        // Se ainda houver questões para mostrar
        if ($currentQuestionIndex < count($currentQuestionIds)) {
            $nextQuestionId = $currentQuestionIds[$currentQuestionIndex];
            $nextQuestion = Question::with('answers')->find($nextQuestionId);
            return view('quiz.start', ['question' => $nextQuestion]); // Passa a próxima questão para a view
        } else {
            // Se todas as questões foram respondidas
            return redirect()->route('quiz.result');
        }
    }

    public function result()
    {
        $score = Session::get('score', 0);
        $totalQuestions = count(Session::get('quiz_questions', []));
        Session::forget(['quiz_questions', 'current_question_index', 'score', 'current_question_ids']); // Limpa a sessão
        return view('quiz.result', compact('score', 'totalQuestions'));
    }
}