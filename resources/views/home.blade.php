@extends('layout')

@section('titulo', 'home')

@section('conteudo')

<div class="container">

    <h1>Seu anúncio aqui</h1>
    <p><a href="{{route('grupos.index')}}">Clique aqui para visualizar os seus grupos</a></p>
</div>

<div class="container">
    <div class="row">
        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Anúncio 1</span>
                    <p>Descrição do anúncio 1</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Anúncio 2</span>
                    <p>Descrição do anúncio 2</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Anúncio 3</span>
                    <p>Descrição do anúncio 3</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Anúncio 4</span>
                    <p>Descrição do anúncio 4</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l6">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Anúncio 5</span>
                    <p>Descrição do anúncio 5</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicionar mais anúncios aqui, se necessário -->
</div>

@endsection
