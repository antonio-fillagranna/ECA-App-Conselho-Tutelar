<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Exibe o formulário de contato.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('contact'); // Retorna a view 'contact.blade.php'
    }

    /**
     * Processa o envio do formulário de contato.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Por enquanto, vamos apenas simular o envio e redirecionar com uma mensagem
        // Em uma aplicação real, você enviaria um email aqui, por exemplo:
        // Mail::to('seu-email@example.com')->send(new \App\Mail\ContactFormMail($request->all()));

        return redirect()->route('contact.show')->with('success', 'Sua mensagem foi enviada com sucesso! Em breve entraremos em contato.');
    }
}
