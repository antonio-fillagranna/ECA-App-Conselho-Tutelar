<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question; // Importe o modelo Question
use App\Models\Answer;   // Importe o modelo Answer

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pergunta 1
        $q1 = Question::create(['text' => 'Qual a idade máxima para ser considerada criança, conforme o ECA?']);
        $q1->answers()->createMany([
            ['text' => '10 anos incompletos', 'is_correct' => false],
            ['text' => '12 anos incompletos', 'is_correct' => true],
            ['text' => '14 anos incompletos', 'is_correct' => false],
            ['text' => '18 anos incompletos', 'is_correct' => false],
        ]);

        // Pergunta 2
        $q2 = Question::create(['text' => 'Onde está previsto o direito à liberdade e ao respeito da criança e do adolescente?']);
        $q2->answers()->createMany([
            ['text' => 'Apenas na Constituição Federal', 'is_correct' => false],
            ['text' => 'No Código Civil', 'is_correct' => false],
            ['text' => 'No Estatuto da Criança e do Adolescente (ECA)', 'is_correct' => true],
            ['text' => 'Em decretos municipais', 'is_correct' => false],
        ]);

        // Pergunta 3
        $q3 = Question::create(['text' => 'Qual dos seguintes NÃO é um direito fundamental da criança e do adolescente, segundo o ECA?']);
        $q3->answers()->createMany([
            ['text' => 'Direito à vida e à saúde', 'is_correct' => false],
            ['text' => 'Direito à liberdade, ao respeito e à dignidade', 'is_correct' => false],
            ['text' => 'Direito de trabalhar em qualquer idade', 'is_correct' => true], // Esta é a INCORRETA/CORRETA
            ['text' => 'Direito à convivência familiar e comunitária', 'is_correct' => false],
        ]);

        // Repita o padrão acima para suas 30 perguntas
        // Exemplo para a Pergunta 4 (você criaria a sua aqui):
        // $q4 = Question::create(['text' => 'Sua quarta pergunta aqui?']);
        // $q4->answers()->createMany([
        //     ['text' => 'Opção 1', 'is_correct' => false],
        //     ['text' => 'Opção 2', 'is_correct' => true],
        //     ['text' => 'Opção 3', 'is_correct' => false],
        //     ['text' => 'Opção 4', 'is_correct' => false],
        // ]);
    }
}