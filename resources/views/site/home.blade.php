@extends('layout')

@section('titulo', 'Título da Página')

@section('conteudo')
    <br><br><br><br>

    <div class="row">
        <div class="col s12">
            <a class="btn-floating waves-effect waves-light red tooltipped" title="Novo grupo" data-position="bottom" data-tooltip="Adicionar Novo Grupo" onclick="toggleInput()"><i class="material-icons">+</i></a>
        </div>
    </div>

    <div class="row" id="campoInput" style="display: none;">
        <form action="{{ route('grupo.novo') }}" method="POST">
            @csrf
            <div class="input-field col s12">
                <input type="text" name="nome_grupo" id="nome_grupo" placeholder="Nome do grupo">
                <button class="btn waves-effect waves-light" type="submit">Enviar</button>
            </div>
        </form>
    </div>

    <div class="row">

        @foreach ($grupos as $grupo )

        <div class="col s12 m6 l4 xl3">
            <div class="card">
                <div class="card-content">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('grupo.detalhe', $grupo->id)}}"><span class="card-title center">{{$grupo->nome_grupo}}</span></a>
                        {{-- <a href="#" class="btn-floating waves-effect waves-light red" title="Adicionar membros"><i class="material-icons">+</i></a> --}}
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
            if (campoInput.style.display === "none") {
                campoInput.style.display = "block";
            } else {
                campoInput.style.display = "none";
            }
        }
    </script>
@endsection
