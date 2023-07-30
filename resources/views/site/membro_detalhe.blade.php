@extends('layout')

@section('titulo', 'Detalhes do Membro')

@section('conteudo')
    <br>

    <div class="row">
        <div class="col s12">
            <h3>{{ $membro->nome}}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div>
                        <a href="javascript:history.back()" class="btn right"><i class="material-icons left">arrow_back</i> Voltar</a>
                    </div>

                    {{-- <h4>Informações do Membro</h4> --}}
                    <div class="row">
                        <div class="col s12">
                            <h5>Total: R$ {{ number_format($membro->valor, 2, ',', '.') }}</h5>
                        </div>

                    </div>
                    <hr>

                    <h4>Itens</h4>
                    <ul class="collection">
                        @foreach ($membro_item as  $membro_inf)
                            <li class="collection-item">
                                <i class="material-icons left">chevron_right</i>
                                <a href="#">{{ $membro_inf->item_nome }}</a> - R$ {{ number_format($membro_inf->membro_valor, 2, ',', '.')  }}
                                <!-- Outras informações do membro -->
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

@endsection
