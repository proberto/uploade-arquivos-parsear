@extends('layouts.dashboard')
@section('content')
    <div class="conteudo_painel">
        <div class="conteudo_painel_int">

            <div class="well well-sm">
                <h3>Importando Arquivo de venda</h3>
                <hr/>
                <p>Arquivo importado com sucesso!!</p>
                <p>Foram gravados no banco de dados {{$vend}} registros</p>
            </div>

            <hr />
            <h3>Dados Importados</h3>
            <div class="row well well-sm">
                <div class="col-sm-2">
                    <p>Comprador</p>
                </div>
                <div class="col-sm-2">
                    <p>Descrição</p>
                </div>

                <div class="col-sm-2">
                    <p>Preço Unitário</p>
                </div>

                <div class="col-sm-2">
                    <p>Quantidade</p>
                </div>

                <div class="col-sm-2">
                    <p>Endereço</p>
                </div>

                <div class="col-sm-2">
                    <p>Fornecedor</p>
                </div>
            </div>

            @foreach($vendas as $venda)
                <div class="row well well-sm">
                    <div class="col-sm-2">
                        <p>{{$venda['comprador']}}</p>
                    </div>
                    <div class="col-sm-2">
                        <p>{{$venda['descricao']}}</p>
                    </div>

                    <div class="col-sm-2">
                        <p>{{$venda['preco_unitario']}}</p>
                    </div>

                    <div class="col-sm-2">
                        <p>{{$venda['quantidade']}}</p>
                    </div>

                    <div class="col-sm-2">
                        <p>{{$venda['endereco']}}</p>
                    </div>

                    <div class="col-sm-2">
                        <p>{{$venda['fornecedor']}}</p>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endsection
