<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato()
    {
        $motivoContato = MotivoContato::all();

        return view('site.contato', ['motivoContatos' => $motivoContato]);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ],
        [
            'required' => 'O campo :attribute precisa ser preenchido'
        ]
        );

        SiteContato::create($request->all());
        return redirect()->route('site.index');

        // return redirect()->back()->with('msg', 'Contato cadastrado com sucesso!');

    }
}
