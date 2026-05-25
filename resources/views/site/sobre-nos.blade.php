@extends('layouts.app')

@section('conteudo')
<h3>Sobre Nós</h3>

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="true" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h5 class="card-title">Quem somos?</h5>
        <p class="card-text">Somos uma empresa dedicada a oferecer os melhores serviços de consultoria em tecnologia.
        </p>
        <a href="#" class="btn btn-primary">Saiba mais</a>
    </div>
</div>

@endsection
