@extends('layouts.dashboard')
@section('content')
    <div class="conteudo_painel">
        <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('home') }}">Inicio</a></li> </ul>
            <hr />
            <h3>Importando Arquivo de venda</h3>
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <form method="POST" action="{{route('importacao.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="foto_capa" class="col-md-4 col-form-label text-md-right">{{ __('Importar Arquivo:') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="file" accept=".txt" name="arquivo" id="arquivo" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
