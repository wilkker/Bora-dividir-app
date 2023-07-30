@extends('layout')

@section('titulo', 'Detalhes do Grupo')

@section('conteudo')
    <br>

    <div class="row">
        <div class="col s12">
            <h3>Detalhes do Grupo</h3>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div>
                        <a href="javascript:history.back()" class="btn right"><i class="material-icons left">arrow_back</i> Voltar</a>
                    </div>
                    <div>
                        <h4>{{ $grupo->nome_grupo }}</h4>
                        <h6>Valor total: R$ {{ number_format($valor_total , 2 ,',', '.') }}</h6>
                    </div>
                    <hr><br>
                    <!-- Outras informações do grupo -->
                    <div>
                        <h5>Membros</h5><br>

                        <ul class="collection">
                            @foreach($grupo->membros as $membro)
                                <li class="collection-item">
                                    <i class="material-icons left">person</i>
                                    <a href="{{ route('membros.detalhes', $membro->id) }}">{{ $membro->nome }}</a> - R$ {{ number_format($membro->valor, 2, ',', '.')  }}
                                    <!-- Outras informações do membro -->
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card-action">
                    <!-- Botões para acionar os modais -->
                    <a href="#" class="btn modal-trigger" data-target="itemForm"><i class="material-icons left">add</i> Adicionar Item</a>
                    <a href="#" class="btn modal-trigger" data-target="membrosForm"><i class="material-icons left">group_add</i> Adicionar Membro</a>
                    <button class="btn red" type="button" onclick="confirmDelete()"><i class="material-icons left">delete</i> Excluir Grupo</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Adicionar Item Formulário (pop-up) --}}
    <div id="itemForm" class="modal">
        <div class="modal-content">
            <h4>Adicionar Item</h4>
            <form action="{{ route('itens.add') }}" method="POST">
                @csrf
                <!-- Resto do formulário aqui -->
                <div class="input-group">
                    <input type="text" id="nome_item" name="nome_item" class="form-control" required>
                    <label for="nome_item" class="input-label">Nome do Item</label>
                </div>
                <div class="input-group">
                    <input type="number" id="valor_item" name="valor_item" class="form-control" required>
                    <label for="valor_item" class="input-label">Valor do Item</label>
                </div>

                <h5>Selecione os membros para dividir este item:</h5>
                <ul class="collection">
                    @foreach($grupo->membros as $membro)
                        <li>
                            <label>
                                <input type="checkbox" name="membros_selecionados[]" value="{{ $membro->id }}">
                                <span>{{ $membro->nome }}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>

    {{-- Adicionar Membro Formulário (pop-up) --}}
    <div id="membrosForm" class="modal">
        <div class="modal-content">
            <h4>Adicionar Membro</h4>
            <form action="{{route('membros.add')}}" method="POST">
                @csrf
                <!-- Resto do formulário aqui -->
                <div class="input-field">
                    <input type="text" id="nome_membro" name="nome_membro" required>
                    <label for="nome_membro">Nome do membro</label>
                </div>
                <input name="grupo_id" value="{{$grupo->id}}" hidden>

                <div id="novosMembros"></div>
                <a href="#" class="btn" onclick="adicionarNovoCampo()">Adicionar mais um</a>


                <button type="submit" class="btn">Salvar</button>
            </form>
        </div>
    </div>


    {{-- função m para adicionar mais de um membro --}}
    <script>
        var contadorMembros = 1;

        function adicionarNovoCampo() {
            contadorMembros++;

            var novoCampo = `
                <div class="input-field">
                    <input type="text" id="nome_membro_${contadorMembros}" name="nome_membro[]" required>
                    <label for="nome_membro_${contadorMembros}">Nome do membro ${contadorMembros}</label>
                    <button type="button" onclick="removerCampo(${contadorMembros})">Remover</button>
                </div>
            `;

            document.getElementById('novosMembros').insertAdjacentHTML('beforeend', novoCampo);
        }

        function removerCampo(contador) {
            var campoRemover = document.getElementById(`nome_membro_${contador}`).parentNode;
            campoRemover.remove();
        }
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar os modais
            var itemFormModal = document.getElementById('itemForm');
            var membrosFormModal = document.getElementById('membrosForm');
            var instances = M.Modal.init(itemFormModal, {});
            var instances = M.Modal.init(membrosFormModal, {});
        });
    </script>

    <style>
        /* Estilos para centralizar o modal */
        .modal {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>

    <script>
        function confirmDelete() {
            if (confirm('Tem certeza de que deseja excluir este grupo?')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>


@endsection

