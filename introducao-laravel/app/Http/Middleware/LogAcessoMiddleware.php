<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $id requisitou a rota $rota"]);

        $resposta = $next($request);
        $resposta->setStatusCode(201, 'O status da resposta foi atualizado pelo LogAcesso');
        return $resposta;
    }
}
