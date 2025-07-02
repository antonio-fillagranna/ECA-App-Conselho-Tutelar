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
        // 1
        $q1 = Question::create(['text' => 'De acordo com o ECA, considera-se criança a pessoa até qual idade?']);
        $q1->answers()->createMany([
            ['text' => 'Doze anos completos', 'is_correct' => false],
            ['text' => 'Doze anos incompletos', 'is_correct' => true],
            ['text' => 'Dezesseis anos incompletos', 'is_correct' => false],
            ['text' => 'Dezoito anos incompletos', 'is_correct' => false],
        ]);

        // 2
        $q2 = Question::create(['text' => 'Qual o principal objetivo do Estatuto da Criança e do Adolescente?']);
        $q2->answers()->createMany([
            ['text' => 'Punir crianças e adolescentes infratores.', 'is_correct' => false],
            ['text' => 'Dispor sobre a proteção integral à criança e ao adolescente.', 'is_correct' => true],
            ['text' => 'Regular o trabalho infantil.', 'is_correct' => false],
            ['text' => 'Apenas garantir o acesso à educação.', 'is_correct' => false],
        ]);

        // 3
        $q3 = Question::create(['text' => 'A quem é assegurado o direito à liberdade, ao respeito e à dignidade?']);
        $q3->answers()->createMany([
            ['text' => 'Apenas aos adolescentes.', 'is_correct' => false],
            ['text' => 'Apenas às crianças.', 'is_correct' => false],
            ['text' => 'À criança e ao adolescente.', 'is_correct' => true],
            ['text' => 'Aos pais e responsáveis.', 'is_correct' => false],
        ]);

        // 4
        $q4 = Question::create(['text' => 'O direito à liberdade compreende, entre outros, o direito de:']);
        $q4->answers()->createMany([
            ['text' => 'Ir, vir e estar nos logradouros públicos e espaços comunitários, salvo restrições legais.', 'is_correct' => true],
            ['text' => 'Escolher a escola, independentemente de vaga.', 'is_correct' => false],
            ['text' => 'Trabalhar a partir dos 10 anos.', 'is_correct' => false],
            ['text' => 'Morar onde quiser, sem supervisão.', 'is_correct' => false],
        ]);

        // 5
        $q5 = Question::create(['text' => 'Qual o papel da família, da comunidade, da sociedade em geral e do poder público na garantia dos direitos da criança e do adolescente?']);
        $q5->answers()->createMany([
            ['text' => 'Apenas do poder público.', 'is_correct' => false],
            ['text' => 'Apenas da família.', 'is_correct' => false],
            ['text' => 'De todos, com absoluta prioridade.', 'is_correct' => true],
            ['text' => 'Ninguém tem responsabilidade, é individual.', 'is_correct' => false],
        ]);

        // 6
        $q6 = Question::create(['text' => 'O direito à vida e à saúde da criança e do adolescente inclui o direito a:']);
        $q6->answers()->createMany([
            ['text' => 'Apenas atendimento médico em caso de doença grave.', 'is_correct' => false],
            ['text' => 'Atendimento pré-natal à gestante e à saúde da criança.', 'is_correct' => true],
            ['text' => 'Exclusivamente vacinação.', 'is_correct' => false],
            ['text' => 'Morar em qualquer lugar.', 'is_correct' => false],
        ]);

        // 7
        $q7 = Question::create(['text' => 'A gestante tem direito a acompanhamento psicológico?']);
        $q7->answers()->createMany([
            ['text' => 'Não, apenas a mãe após o parto.', 'is_correct' => false],
            ['text' => 'Sim, se for necessário.', 'is_correct' => true],
            ['text' => 'Não, o ECA não prevê isso.', 'is_correct' => false],
            ['text' => 'Sim, em casos de gravidez de risco.', 'is_correct' => false],
        ]);

        // 8
        $q8 = Question::create(['text' => 'É dever da família, da comunidade, da sociedade e do poder público assegurar à criança e ao adolescente, com prioridade, o direito à:']);
        $q8->answers()->createMany([
            ['text' => 'Apenas à educação.', 'is_correct' => false],
            ['text' => 'Apenas ao lazer.', 'is_correct' => false],
            ['text' => 'Vida, saúde, alimentação, educação, esporte, lazer, profissionalização, cultura, dignidade, respeito, liberdade e convivência familiar e comunitária.', 'is_correct' => true],
            ['text' => 'Apenas à moradia.', 'is_correct' => false],
        ]);

        // 9
        $q9 = Question::create(['text' => 'Toda criança ou adolescente tem direito a ser criado e educado no seio de sua família e, excepcionalmente, em:']);
        $q9->answers()->createMany([
            ['text' => 'Instituição de acolhimento.', 'is_correct' => true],
            ['text' => 'Casa de amigos.', 'is_correct' => false],
            ['text' => 'Qualquer lugar sem supervisão.', 'is_correct' => false],
            ['text' => 'Apenas com parentes próximos.', 'is_correct' => false],
        ]);

        // 10
        $q10 = Question::create(['text' => 'A colocação em família substituta far-se-á por meio de:']);
        $q10->answers()->createMany([
            ['text' => 'Guarda, tutela ou adoção.', 'is_correct' => true],
            ['text' => 'Apenas guarda.', 'is_correct' => false],
            ['text' => 'Apenas adoção.', 'is_correct' => false],
            ['text' => 'Contrato de trabalho.', 'is_correct' => false],
        ]);

        // 11
        $q11 = Question::create(['text' => 'A guarda confere à criança ou adolescente a condição de:']);
        $q11->answers()->createMany([
            ['text' => 'Filho permanente.', 'is_correct' => false],
            ['text' => 'Dependente para fins previdenciários e assistenciais.', 'is_correct' => true],
            ['text' => 'Apenas morador temporário.', 'is_correct' => false],
            ['text' => 'Herdeiro automático.', 'is_correct' => false],
        ]);

        // 12
        $q12 = Question::create(['text' => 'O que é a tutela, de acordo com o ECA?']);
        $q12->answers()->createMany([
            ['text' => 'Uma medida de proteção temporária.', 'is_correct' => false],
            ['text' => 'Uma forma de colocação em família substituta para menores de 18 anos cujos pais faleceram ou foram suspensos/destituídos do poder familiar.', 'is_correct' => true],
            ['text' => 'Um contrato de trabalho para adolescentes.', 'is_correct' => false],
            ['text' => 'Apenas uma forma de assistência social.', 'is_correct' => false],
        ]);

        // 13
        $q13 = Question::create(['text' => 'A adoção atribui à criança ou adolescente a condição de:']);
        $q13->answers()->createMany([
            ['text' => 'Filho, desligando-o de qualquer vínculo com pais e parentes, salvo os impedimentos matrimoniais.', 'is_correct' => true],
            ['text' => 'Dependente temporário.', 'is_correct' => false],
            ['text' => 'Apenas herdeiro.', 'is_correct' => false],
            ['text' => 'Aluno especial.', 'is_correct' => false],
        ]);

        // 14
        $q14 = Question::create(['text' => 'É proibido qualquer trabalho a menores de:']);
        $q14->answers()->createMany([
            ['text' => '14 anos, salvo na condição de aprendiz.', 'is_correct' => false],
            ['text' => '16 anos, salvo na condição de aprendiz.', 'is_correct' => true],
            ['text' => '18 anos, em qualquer condição.', 'is_correct' => false],
            ['text' => '12 anos, em qualquer condição.', 'is_correct' => false],
        ]);

        // 15
        $q15 = Question::create(['text' => 'A profissionalização e a proteção no trabalho do adolescente são direitos assegurados pelo ECA, visando:']);
        $q15->answers()->createMany([
            ['text' => 'Apenas a geração de renda.', 'is_correct' => false],
            ['text' => 'O preparo para o exercício de qualquer profissão.', 'is_correct' => false],
            ['text' => 'O acesso e a integração no mercado de trabalho, respeitando suas condições peculiares de pessoa em desenvolvimento.', 'is_correct' => true],
            ['text' => 'Apenas a formação teórica.', 'is_correct' => false],
        ]);

        // 16
        $q16 = Question::create(['text' => 'Qual a idade mínima para o trabalho noturno, perigoso ou insalubre?']);
        $q16->answers()->createMany([
            ['text' => '16 anos.', 'is_correct' => false],
            ['text' => '18 anos.', 'is_correct' => true],
            ['text' => '14 anos.', 'is_correct' => false],
            ['text' => 'Não há restrição de idade.', 'is_correct' => false],
        ]);

        // 17
        $q17 = Question::create(['text' => 'O direito à educação visa, entre outros, ao pleno desenvolvimento da pessoa, seu preparo para o exercício da cidadania e sua qualificação para o:']);
        $q17->answers()->createMany([
            ['text' => 'Trabalho.', 'is_correct' => true],
            ['text' => 'Lazer.', 'is_correct' => false],
            ['text' => 'Esporte.', 'is_correct' => false],
            ['text' => 'Apenas para a vida em família.', 'is_correct' => false],
        ]);

        // 18
        $q18 = Question::create(['text' => 'É direito da criança e do adolescente ter acesso à escola pública e gratuita:']);
        $q18->answers()->createMany([
            ['text' => 'Apenas no ensino fundamental.', 'is_correct' => false],
            ['text' => 'Próxima de sua residência.', 'is_correct' => true],
            ['text' => 'Apenas para crianças.', 'is_correct' => false],
            ['text' => 'Apenas para adolescentes.', 'is_correct' => false],
        ]);

        // 19
        $q19 = Question::create(['text' => 'O que é o Conselho Tutelar?']);
        $q19->answers()->createMany([
            ['text' => 'Um órgão do Poder Judiciário.', 'is_correct' => false],
            ['text' => 'Um órgão permanente e autônomo, não jurisdicional, encarregado pela sociedade de zelar pelo cumprimento dos direitos da criança e do adolescente.', 'is_correct' => true],
            ['text' => 'Uma ONG de proteção infantil.', 'is_correct' => false],
            ['text' => 'Um órgão de segurança pública.', 'is_correct' => false],
        ]);

        // 20
        $q20 = Question::create(['text' => 'Os membros do Conselho Tutelar são eleitos pela comunidade para um mandato de:']);
        $q20->answers()->createMany([
            ['text' => 'Dois anos.', 'is_correct' => false],
            ['text' => 'Três anos.', 'is_correct' => false],
            ['text' => 'Quatro anos.', 'is_correct' => true],
            ['text' => 'Cinco anos.', 'is_correct' => false],
        ]);

        // 21
        $q21 = Question::create(['text' => 'Qual a principal função do Conselho Tutelar?']);
        $q21->answers()->createMany([
            ['text' => 'Julgar e punir adolescentes infratores.', 'is_correct' => false],
            ['text' => 'Aplicar medidas de proteção à criança e ao adolescente.', 'is_correct' => true],
            ['text' => 'Gerenciar escolas públicas.', 'is_correct' => false],
            ['text' => 'Aconselhar pais sobre educação.', 'is_correct' => false],
        ]);

        // 22
        $q22 = Question::create(['text' => 'As medidas de proteção à criança e ao adolescente são aplicáveis sempre que os direitos reconhecidos no ECA forem:']);
        $q22->answers()->createMany([
            ['text' => 'Ignorados pelos pais.', 'is_correct' => false],
            ['text' => 'Ameaçados ou violados.', 'is_correct' => true],
            ['text' => 'Cumpridos parcialmente.', 'is_correct' => false],
            ['text' => 'Apenas em casos de crimes.', 'is_correct' => false],
        ]);

        // 23
        $q23 = Question::create(['text' => 'Uma das medidas de proteção é o encaminhamento aos pais ou responsável, mediante:']);
        $q23->answers()->createMany([
            ['text' => 'Multa.', 'is_correct' => false],
            ['text' => 'Termo de responsabilidade.', 'is_correct' => true],
            ['text' => 'Prisão.', 'is_correct' => false],
            ['text' => 'Advertência verbal.', 'is_correct' => false],
        ]);

        // 24
        $q24 = Question::create(['text' => 'O que são as medidas socioeducativas?']);
        $q24->answers()->createMany([
            ['text' => 'Medidas aplicadas a crianças que cometem atos infracionais.', 'is_correct' => false],
            ['text' => 'Medidas aplicadas a adolescentes que praticam ato infracional.', 'is_correct' => true],
            ['text' => 'Medidas de proteção para crianças em situação de risco.', 'is_correct' => false],
            ['text' => 'Medidas educativas para pais.', 'is_correct' => false],
        ]);

        // 25
        $q25 = Question::create(['text' => 'A medida socioeducativa de internação pode ser aplicada por ato infracional cometido com:']);
        $q25->answers()->createMany([
            ['text' => 'Ameaça.', 'is_correct' => false],
            ['text' => 'Violência ou grave ameaça à pessoa.', 'is_correct' => true],
            ['text' => 'Furto simples.', 'is_correct' => false],
            ['text' => 'Dano ao patrimônio público.', 'is_correct' => false],
        ]);

        // 26
        $q26 = Question::create(['text' => 'Qual o prazo máximo para a internação de um adolescente?']);
        $q26->answers()->createMany([
            ['text' => 'Seis meses.', 'is_correct' => false],
            ['text' => 'Um ano.', 'is_correct' => false],
            ['text' => 'Dois anos.', 'is_correct' => false],
            ['text' => 'Três anos.', 'is_correct' => true],
        ]);

        // 27
        $q27 = Question::create(['text' => 'O direito ao respeito consiste na inviolabilidade da integridade física, psíquica e:']);
        $q27->answers()->createMany([
            ['text' => 'Social da criança e do adolescente.', 'is_correct' => false],
            ['text' => 'Moral da criança e do adolescente.', 'is_correct' => true],
            ['text' => 'Escolar da criança e do adolescente.', 'is_correct' => false],
            ['text' => 'Familiar da criança e do adolescente.', 'is_correct' => false],
        ]);

        // 28
        $q28 = Question::create(['text' => 'É dever de todos velar pela dignidade da criança e do adolescente, pondo-os a salvo de qualquer tratamento:']);
        $q28->answers()->createMany([
            ['text' => 'Diferenciado.', 'is_correct' => false],
            ['text' => 'Desumano, violento, aterrorizante, vexatório ou constrangedor.', 'is_correct' => true],
            ['text' => 'Educativo.', 'is_correct' => false],
            ['text' => 'Restritivo.', 'is_correct' => false],
        ]);

        // 29
        $q29 = Question::create(['text' => 'A criança e o adolescente têm direito à liberdade, ao respeito e à dignidade como pessoas humanas em processo de desenvolvimento e como:']);
        $q29->answers()->createMany([
            ['text' => 'Sujeitos de direitos civis, culturais e sociais.', 'is_correct' => false],
            ['text' => 'Sujeitos de direitos civis, humanos e sociais.', 'is_correct' => true], // A constituição e o ECA usam a terminologia "direitos humanos" nesse contexto
            ['text' => 'Sujeitos de direitos civis, políticos e sociais.', 'is_correct' => false],
            ['text' => 'Sujeitos de direitos civis, humanos e políticos.', 'is_correct' => false],
        ]);

        // 30
        $q30 = Question::create(['text' => 'O direito à convivência familiar e comunitária é assegurado a crianças e adolescentes, priorizando a manutenção na:']);
        $q30->answers()->createMany([
            ['text' => 'Família extensa.', 'is_correct' => false],
            ['text' => 'Família natural.', 'is_correct' => true],
            ['text' => 'Instituição de acolhimento.', 'is_correct' => false],
            ['text' => 'Família substituta.', 'is_correct' => false],
        ]);

        // 31
        $q31 = Question::create(['text' => 'A família natural é a comunidade formada pelos pais ou qualquer deles e seus:']);
        $q31->answers()->createMany([
            ['text' => 'Filhos.', 'is_correct' => true],
            ['text' => 'Amigos.', 'is_correct' => false],
            ['text' => 'Vizinhos.', 'is_correct' => false],
            ['text' => 'Colegas de escola.', 'is_correct' => false],
        ]);

        // 32
        $q32 = Question::create(['text' => 'A família extensa ou ampliada é aquela que se estende para além da unidade de pais e filhos ou da unidade do casal, formada por parentes próximos com os quais a criança ou adolescente:']);
        $q32->answers()->createMany([
            ['text' => 'Não possui vínculo.', 'is_correct' => false],
            ['text' => 'Convive e mantém vínculos de afinidade e afetividade.', 'is_correct' => true],
            ['text' => 'Visita ocasionalmente.', 'is_correct' => false],
            ['text' => 'Tem apenas contato telefônico.', 'is_correct' => false],
        ]);

        // 33
        $q33 = Question::create(['text' => 'A permanência da criança e do adolescente em programa de acolhimento institucional não se prolongará por mais de:']);
        $q33->answers()->createMany([
            ['text' => '3 meses.', 'is_correct' => false],
            ['text' => '6 meses.', 'is_correct' => false],
            ['text' => '1 ano.', 'is_correct' => false],
            ['text' => '18 meses.', 'is_correct' => true],
        ]);

        // 34
        $q34 = Question::create(['text' => 'O que é o poder familiar?']);
        $q34->answers()->createMany([
            ['text' => 'O direito dos pais de fazer o que quiserem com os filhos.', 'is_correct' => false],
            ['text' => 'O conjunto de direitos e deveres referentes à pessoa e aos bens do filho menor.', 'is_correct' => true],
            ['text' => 'A capacidade de um filho sustentar os pais.', 'is_correct' => false],
            ['text' => 'A autoridade do filho sobre os pais.', 'is_correct' => false],
        ]);

        // 35
        $q35 = Question::create(['text' => 'A suspensão ou destituição do poder familiar será decretada judicialmente, em procedimento contraditório, nos casos previstos em:']);
        $q35->answers()->createMany([
            ['text' => 'Regulamento escolar.', 'is_correct' => false],
            ['text' => 'Lei.', 'is_correct' => true],
            ['text' => 'Acordo familiar.', 'is_correct' => false],
            ['text' => 'Decisão do Conselho Tutelar.', 'is_correct' => false],
        ]);

        // 36
        $q36 = Question::create(['text' => 'A criança e o adolescente têm direito à liberdade de crença e culto religioso?']);
        $q36->answers()->createMany([
            ['text' => 'Não, apenas a partir dos 18 anos.', 'is_correct' => false],
            ['text' => 'Sim.', 'is_correct' => true],
            ['text' => 'Apenas com autorização dos pais.', 'is_correct' => false],
            ['text' => 'Apenas se a família for religiosa.', 'is_correct' => false],
        ]);

        // 37
        $q37 = Question::create(['text' => 'O direito à cultura, esporte e lazer é garantido por meio de:']);
        $q37->answers()->createMany([
            ['text' => 'Apenas atividades escolares.', 'is_correct' => false],
            ['text' => 'Programas e projetos que promovam o desenvolvimento integral.', 'is_correct' => true],
            ['text' => 'Apenas acesso a clubes privados.', 'is_correct' => false],
            ['text' => 'Exclusivamente aulas de música.', 'is_correct' => false],
        ]);

        // 38
        $q38 = Question::create(['text' => 'É dever do Estado assegurar ensino fundamental obrigatório e gratuito, inclusive para os que a ele não tiveram acesso na idade própria, por meio de:']);
        $q38->answers()->createMany([
            ['text' => 'Educação a distância.', 'is_correct' => false],
            ['text' => 'Educação de jovens e adultos.', 'is_correct' => true],
            ['text' => 'Escolas particulares subsidiadas.', 'is_correct' => false],
            ['text' => 'Apenas supletivos.', 'is_correct' => false],
        ]);

        // 39
        $q39 = Question::create(['text' => 'O direito ao respeito inclui o direito de não ser submetido a:']);
        $q39->answers()->createMany([
            ['text' => 'Qualquer forma de disciplina.', 'is_correct' => false],
            ['text' => 'Castigo físico ou tratamento cruel ou degradante.', 'is_correct' => true],
            ['text' => 'Tarefas domésticas.', 'is_correct' => false],
            ['text' => 'Estudo.', 'is_correct' => false],
        ]);

        // 40
        $q40 = Question::create(['text' => 'A criança ou adolescente com deficiência tem direito a atendimento educacional especializado, preferencialmente na:']);
        $q40->answers()->createMany([
            ['text' => 'Escola especial.', 'is_correct' => false],
            ['text' => 'Rede regular de ensino.', 'is_correct' => true],
            ['text' => 'Instituição de caridade.', 'is_correct' => false],
            ['text' => 'Em casa, com professor particular.', 'is_correct' => false],
        ]);

        // 41
        $q41 = Question::create(['text' => 'O que é considerado ato infracional pelo ECA?']);
        $q41->answers()->createMany([
            ['text' => 'Qualquer desobediência aos pais.', 'is_correct' => false],
            ['text' => 'Conduta descrita como crime ou contravenção penal.', 'is_correct' => true],
            ['text' => 'Brincadeira de mau gosto.', 'is_correct' => false],
            ['text' => 'Apenas brigas na escola.', 'is_correct' => false],
        ]);

        // 42
        $q42 = Question::create(['text' => 'Ao adolescente autor de ato infracional, podem ser aplicadas as medidas socioeducativas de:']);
        $q42->answers()->createMany([
            ['text' => 'Advertência, obrigação de reparar o dano, prestação de serviços à comunidade, liberdade assistida, semiliberdade e internação.', 'is_correct' => true],
            ['text' => 'Multa e prisão.', 'is_correct' => false],
            ['text' => 'Apenas advertência.', 'is_correct' => false],
            ['text' => 'Apenas internação.', 'is_correct' => false],
        ]);

        // 43
        $q43 = Question::create(['text' => 'A medida de advertência será aplicada quando houver prova de materialidade e indícios suficientes de autoria de ato infracional de:']);
        $q43->answers()->createMany([
            ['text' => 'Grande potencial ofensivo.', 'is_correct' => false],
            ['text' => 'Menor potencial ofensivo.', 'is_correct' => true],
            ['text' => 'Violência.', 'is_correct' => false],
            ['text' => 'Grave ameaça.', 'is_correct' => false],
        ]);

        // 44
        $q44 = Question::create(['text' => 'A prestação de serviços à comunidade consiste na realização de tarefas gratuitas de interesse geral, por período não excedente a:']);
        $q44->answers()->createMany([
            ['text' => 'Seis meses.', 'is_correct' => true],
            ['text' => 'Um ano.', 'is_correct' => false],
            ['text' => 'Dois anos.', 'is_correct' => false],
            ['text' => 'Três anos.', 'is_correct' => false],
        ]);

        // 45
        $q45 = Question::create(['text' => 'A liberdade assistida será fixada pelo prazo mínimo de:']);
        $q45->answers()->createMany([
            ['text' => 'Seis meses.', 'is_correct' => true],
            ['text' => 'Um ano.', 'is_correct' => false],
            ['text' => 'Dois anos.', 'is_correct' => false],
            ['text' => 'Três meses.', 'is_correct' => false],
        ]);

        // 46
        $q46 = Question::create(['text' => 'A medida de semiliberdade pode ser aplicada como forma de transição para o meio aberto, sem prazo determinado, mas com reavaliação máxima a cada:']);
        $q46->answers()->createMany([
            ['text' => 'Três meses.', 'is_correct' => false],
            ['text' => 'Seis meses.', 'is_correct' => true],
            ['text' => 'Um ano.', 'is_correct' => false],
            ['text' => 'Dois anos.', 'is_correct' => false],
        ]);

        // 47
        $q47 = Question::create(['text' => 'O que é o direito à dignidade, segundo o ECA?']);
        $q47->answers()->createMany([
            ['text' => 'O direito de ser tratado com respeito, sem discriminação.', 'is_correct' => true],
            ['text' => 'O direito de ter um bom emprego.', 'is_correct' => false],
            ['text' => 'O direito de ser famoso.', 'is_correct' => false],
            ['text' => 'O direito de não ter responsabilidades.', 'is_correct' => false],
        ]);

        // 48
        $q48 = Question::create(['text' => 'A proteção contra toda forma de negligência, discriminação, exploração, violência, crueldade e opressão é um direito:']);
        $q48->answers()->createMany([
            ['text' => 'Apenas dos adultos.', 'is_correct' => false],
            ['text' => 'Assegurado à criança e ao adolescente.', 'is_correct' => true],
            ['text' => 'Apenas dos infratores.', 'is_correct' => false],
            ['text' => 'Apenas das crianças de rua.', 'is_correct' => false],
        ]);

        // 49
        $q49 = Question::create(['text' => 'Qual a importância da convivência familiar e comunitária para a criança e o adolescente?']);
        $q49->answers()->createMany([
            ['text' => 'É irrelevante para o desenvolvimento.', 'is_correct' => false],
            ['text' => 'É fundamental para o seu desenvolvimento integral.', 'is_correct' => true],
            ['text' => 'Apenas importante para a socialização.', 'is_correct' => false],
            ['text' => 'Só é importante na primeira infância.', 'is_correct' => false],
        ]);

        // 50
        $q50 = Question::create(['text' => 'O que o ECA estabelece sobre a participação da criança e do adolescente na vida familiar e comunitária?']);
        $q50->answers()->createMany([
            ['text' => 'Não há previsão para a participação.', 'is_correct' => false],
            ['text' => 'Devem ser ouvidos e participar das decisões que lhes dizem respeito.', 'is_correct' => true],
            ['text' => 'Devem apenas obedecer às regras.', 'is_correct' => false],
            ['text' => 'Só podem participar se forem maiores de 16 anos.', 'is_correct' => false],
        ]);
    }
}