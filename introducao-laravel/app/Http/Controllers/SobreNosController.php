<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Log;

class SobreNosController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('log.acesso')
        ];
    }

    public function sobreNos()
    {
        return view('site.sobre-nos');
    }
}
