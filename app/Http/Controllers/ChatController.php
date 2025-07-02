<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function askIa(Request $request)
    {
        $userQuestion = $request->input('question');
        $iaApiUrl = env('IA_API_ENDPOINT');
        $iaApiKey = env('IA_API_KEY');

        // Remova ou comente a linha de debug do token se não for mais necessária
        // Log::info('IA API Key being used: ' . substr($iaApiKey, 0, 8) . '...');

        if (!$userQuestion || !$iaApiUrl || !$iaApiKey) {
            return response()->json(['error' => 'Configuração ou pergunta inválida.'], 400);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$iaApiKey}",
                'Content-Type' => 'application/json',
                'HTTP-Referer' => config('app.url'), // Recomendado pelo OpenRouter
                'X-Title' => config('app.name'),     // Recomendado pelo OpenRouter
            ])->post($iaApiUrl, [
                // *** ESCOLHA UM MODELO GRATUITO DO OPENROUTER AQUI ***
                // Sugestões: 'mistralai/mixtral-8x7b-instruct' (ótimo e geralmente gratuito)
                //           'google/gemma-7b-it' (bom, gratuito, da Google)
                //           'openai/gpt-3.5-turbo' (muito bom, mas tem custos associados)
                'model' => 'mistralai/mixtral-8x7b-instruct',
                'messages' => [
                    ['role' => 'system', 'content' => 'Você é um especialista no Estatuto da Criança e do Adolescente (ECA) brasileiro. Responda apenas sobre o ECA. Se a pergunta não for sobre o ECA, diga que não pode ajudar.'],
                    ['role' => 'user', 'content' => $userQuestion],
                ],
                'max_tokens' => 200,
                'temperature' => 0.7,
            ]);

            // Verifique se a resposta da API foi bem-sucedida (status 2xx)
            if ($response->successful()) {
                $data = $response->json();
                // O OpenRouter/OpenAI retorna a resposta em 'choices[0].message.content'
                if (isset($data['choices'][0]['message']['content'])) {
                    $iaAnswer = $data['choices'][0]['message']['content'];
                    return response()->json(['answer' => $iaAnswer]);
                } else {
                    // Se o formato da resposta for inesperado, logar para depuração
                    Log::error('Formato de resposta inesperado da IA: ' . json_encode($data));
                    return response()->json(['error' => 'Resposta da IA em formato inesperado.'], 500);
                }
            } else {
                // Se a API retornar um erro (e.g., 400, 401, 429, 500)
                Log::error('Erro na API da IA: ' . $response->status() . ' - ' . $response->body());
                return response()->json(['error' => 'Erro ao consultar a IA: ' . $response->body()], $response->status());
            }

        } catch (\Exception $e) {
            Log::error('Exceção ao chamar a IA: ' . $e->getMessage());
            return response()->json(['error' => 'Ocorreu um erro no servidor. Tente novamente mais tarde.'], 500);
        }
    }
}