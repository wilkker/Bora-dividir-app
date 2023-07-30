@extends('layout')

@section('titulo', 'Título da Página')

@section('conteudo')
    <br><br><br><br>

    <div class="row">
        <div class="col s12">
            <a class="btn-floating btn-large waves-effect waves-light red tooltipped" title="Novo grupo" data-position="bottom" data-tooltip="Adicionar Novo Grupo" onclick="toggleInput()">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>

    <div class="row" id="campoInput" style="display: none;">
        <form action="{{ route('grupo.novo') }}" method="POST" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field col s12 m8 offset-m2 l6 offset-l3">
                    <input type="text" name="nome_grupo" id="nome_grupo" placeholder="Nome do grupo">
                </div>
                <div class="input-field col s12 m4 offset-m2 l4 offset-l4">
                    <button class="btn waves-effect waves-light" type="submit">Criar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        @foreach ($grupos as $grupo )
            <div class="col s12 m6 l4 xl3">
                <div class="card">
                    <div class="card-content">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('grupo.detalhe', $grupo->id)}}">
                                <span class="card-title center">{{$grupo->nome_grupo}}</span>
                            </a>
                        </div>
                        <hr>
                        {{-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga tempora consectetur animi odit deserunt, rerum reprehenderit ratione quidem vero possimus voluptates laborum commodi dolor vel nemo corrupti suscipit aut esse!</p> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function toggleInput() {
            var campoInput = document.getElementById('campoInput');
            campoInput.style.display = campoInput.style.display === "none" ? "block" : "none";
        }
    </script>
@endsection
