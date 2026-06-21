<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodoAutenticacao): Response
    {
        echo $metodoAutenticacao.'<br>';
        if ($metodoAutenticacao == 'padrao') {
            echo 'Verificar o usuario e senha no DB'.'<br>';
        }

        if ($metodoAutenticacao == 'ldap') {
            echo 'Verificar usuario e senha no AD'.'<br>';
        }

        if (false)
            return $next($request);

        return Response('Acesso negado, rota precisa de autenticação!!');
    }
}
