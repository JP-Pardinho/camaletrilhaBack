@extends('layouts.app')

@section('conteudo')
<h3>Principal (view)</h3>

<ul class="list-group">
    <li class="list-group-item">
        <button type="button" class="btn btn-primary">
            <a class="text-white text-decoration-none" href="{{ route('site.index') }}">Principal</a>
        </button>
    </li>
    <li class="list-group-item">
        <button type="button" class="btn btn-secondary">
            <a class="text-white text-decoration-none" href="{{ route('site.contato') }}">Contato</a>
        </button>
    </li>
    <li class="list-group-item">
        <button type="button" class="btn btn-success">
            <a class="text-white text-decoration-none" href="{{ route('site.sobrenos') }}">Sobre nós</a>
        </button>
    </li>
</ul>
@endsection