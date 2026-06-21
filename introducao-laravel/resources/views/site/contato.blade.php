@extends('layouts.app')

@section('conteudo')

<div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<h3>Contato</h3>

<form action="{{ route('site.contato.salvar') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="nome" class="form-label">Nome</label>
        <input name="nome" type="text" class="form-control" id="nome" placeholder="Seu nome" value="{{ old('nome') }}">
        @if ($errors->has('nome'))
            {{ $errors->first('nome') }}
        @endif
    </div>

    <div class="mb-4">
        <label for="telefone" class="form-label">Telefone</label>
        <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Seu telefone"
            value="{{ old('telefone') }}">
        {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    </div>

    <div class="mb-4">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="seu.email@example.com"
            value="{{ old('email') }}">
        {{ $errors->has('email') ? $errors->first('email') : '' }}

    </div>

    <div class="mb-4">
        <label for="motivo_contato" class="form-label">Motivo do contato</label>
        <select name="motivo_contatos_id" class="form-select" aria-label="Motivo do contato" id="motivo">
            <option selected disabled>Motivo do contato?</option>
            @foreach ($motivoContatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}">
                {{ $motivo_contato->motivo_contato }}
            </option>
            @endforeach
        </select>
        {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    </div>

    <div class="mb-4">
        <label for="mensagem" class="form-label">Mensagem</label>
        <textarea name="mensagem" class="form-control" id="mensagem" rows="3" placeholder="Sua mensagem">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui sua mensagem' }}
        </textarea>
        {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    </div>

    <button class="btn btn-secondary" type="submit">Enviar</button>
</form>
@endsection
