<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat sobre o ECA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="chat-window" class="border p-4 h-96 overflow-y-auto mb-4 bg-gray-50 rounded-lg flex flex-col space-y-2">
                        {{-- Mensagens do chat aparecerão aqui --}}
                        <div class="text-center text-gray-500 mb-2">Bem-vindo ao Chat do ECA! Pergunte sobre o Estatuto da Criança e do Adolescente.</div>
                    </div>

                    <div class="flex">
                        <x-text-input id="user-input" class="block w-full mr-2" type="text" placeholder="Digite sua pergunta sobre o ECA..." />
                        <x-primary-button id="send-button">
                            {{ __('Enviar') }}
                        </x-primary-button>
                    </div>

                    <div id="typing-indicator" class="mt-2 text-sm text-gray-600 hidden">
                        IA está digitando...
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Script do chat carregado! (DOMContentLoaded)'); // <-- NOVO: 1º Ponto de verificação

            const userInput = document.getElementById('user-input');
            const sendButton = document.getElementById('send-button');
            const chatWindow = document.getElementById('chat-window');
            const typingIndicator = document.getElementById('typing-indicator');

            // NOVO: 2º Ponto de verificação
            if (!userInput) {
                console.error('ERRO: Elemento com ID "user-input" não encontrado!');
                return; // Para o script se o elemento essencial não for encontrado
            }
            if (!sendButton) {
                console.error('ERRO: Elemento com ID "send-button" não encontrado!');
                return; // Para o script
            }
            console.log('Todos os elementos HTML encontrados!'); // <-- NOVO: 3º Ponto de verificação


            // Função para adicionar mensagem ao chat
            function addMessage(sender, text, type = 'user') {
                const messageElement = document.createElement('div');
                messageElement.classList.add('mb-2', 'p-2', 'rounded-lg', 'break-words');
                if (type === 'user') {
                    messageElement.classList.add('bg-blue-100', 'self-end', 'ml-auto', 'max-w-[70%]');
                    messageElement.textContent = `Você: ${text}`;
                    messageElement.style.textAlign = 'right';
                } else {
                    messageElement.classList.add('bg-gray-200', 'self-start', 'mr-auto', 'max-w-[70%]');
                    messageElement.textContent = `ECA-IA: ${text}`;
                }
                chatWindow.appendChild(messageElement);
                chatWindow.scrollTop = chatWindow.scrollHeight;
            }

            // Função para enviar a pergunta
            async function sendMessage() {
                console.log('Função sendMessage chamada!'); // <-- NOVO: 4º Ponto de verificação

                const question = userInput.value.trim();
                if (!question) {
                    console.warn('Pergunta vazia, não enviando.'); // NOVO
                    return;
                }

                addMessage('user', question, 'user');
                userInput.value = '';
                sendButton.disabled = true;
                typingIndicator.classList.remove('hidden');

                try {
                    console.log('Tentando fazer fetch para:', '{{ route('chat.ask-ia') }}'); // NOVO: 5º Ponto de verificação
                    const response = await fetch('{{ route('chat.ask-ia') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ question: question })
                    });

                    const data = await response.json();

                    if (response.ok) {
                        addMessage('ia', data.answer, 'ia');
                    } else {
                        addMessage('ia', `Erro: ${data.error || 'Não foi possível obter resposta.'}`, 'ia');
                    }
                } catch (error) {
                    console.error('Erro na requisição Fetch:', error); // NOVO
                    addMessage('ia', 'Erro de conexão. Verifique sua rede ou tente mais tarde.', 'ia');
                } finally {
                    sendButton.disabled = false;
                    typingIndicator.classList.add('hidden');
                    userInput.focus();
                }
            }

            // Event listeners
            sendButton.addEventListener('click', sendMessage);
            console.log('Event listener de click adicionado ao botão de enviar.'); // <-- NOVO: 6º Ponto de verificação

            userInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    console.log('Enter pressionado no input de usuário.'); // NOVO
                    sendMessage();
                }
            });
            console.log('Event listener de keypress adicionado ao input de usuário.'); // NOVO

        });
    </script>
    @endpush
</x-app-layout>