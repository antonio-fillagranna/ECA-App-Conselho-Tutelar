<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\User; // Para carregar os dados do usuário

class LeaderboardController extends Controller
{
    public function index()
    {
        // Busca as 10 maiores pontuações, ordenadas por pontuação decrescente
        // E carrega os dados do usuário relacionado (usando "with('user')")
        $topScores = Score::with('user')
                            ->orderByDesc('score')
                            ->limit(10) // Quantos você quer mostrar no leaderboard
                            ->get();

        return view('leaderboard.index', compact('topScores'));
    }
}