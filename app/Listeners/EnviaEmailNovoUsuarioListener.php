<?php

namespace SBAnalysis\Listeners;

use Illuminate\Support\Facades\Mail;
use SBAnalysis\Events\EnviaEmailNovoUsuarioEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviaEmailNovoUsuarioListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EnviaEmailNovoUsuarioEvent  $event
     * @return void
     */
    public function handle(EnviaEmailNovoUsuarioEvent $event)
    {
        $usuario = $event->getUsuario();

        Mail::send('emails.confirmacao_cadastro', ['usuario' => $usuario], function ($m) use ($usuario) {
            $m->from('sky@skyinformatica.com.br', 'SkyBug Analysis' );
            $m->to($usuario->email, $usuario->senha)->subject('Confirmação de Cadastro');
        });
    }
}
