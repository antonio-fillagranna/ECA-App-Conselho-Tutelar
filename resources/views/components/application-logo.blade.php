<a href="/">
    <img src="{{ asset('build/assets/images/logo-conselho.png') }}" alt="Logo Conselho Tutelar" {{ $attributes }}>
    {{--
        Ajuste as classes de tamanho da imagem se precisar.
        As classes 'w-20 h-20' que eu sugeri antes podem ser adicionadas no final de {{ $attributes }}
        ou diretamente aqui se você não quiser depender das classes passadas.
        Por exemplo: class="w-20 h-20" no lugar de {{ $attributes }}
        ou class="w-20 h-20" {{ $attributes }} se quiser combinar.
        Comece simples:
    --}}
    {{-- Exemplo simples: <img src="{{ asset('build/assets/images/logo-conselho.png') }}" alt="Logo Conselho Tutelar" class="w-20 h-20"> --}}
</a>