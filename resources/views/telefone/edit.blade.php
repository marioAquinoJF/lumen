
@extends('layout')
@section('content')
<div class="row">
    
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                Editar Telefone
            </h3>
        </div>
        <div class="panel-body">

            <div class="col-md-6">
                @if (session()->get('data'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session()->get('data') }}</li>
                    </ul>
                </div>
                @endif
                <form class="form-horizontal" action='{{route('telefone.update',['id'=>$pessoa->id,'telefoneId'=>$telefone->id])}}' method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group col-sm-12">
                        <label for="cod_país" class="col-sm-6 control-label">Código do País: </label>
                        <div >
                            <input type="text" style="width:55px; " class="form-control input-sm" name="cod_país" id="cod_país" placeholder="Nome" value="{{$telefone->cod_país}}">
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="ddd" class="col-sm-6 control-label">DDD: </label>
                        <div >
                            <input type="text" style="width:55px; " class="col-sm-12 form-control input-sm"  name="ddd" id="ddd" placeholder="DDD" value="{{$telefone->ddd}}">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="prefixo" class="col-sm-6 control-label">Número: </label>
                        <div >
                            <input type="text" style="width:55px; display: inline-block;" class="form-control input-sm"  name="prefixo" id="prefixo" placeholder="" value="{{$telefone->prefixo}}">
                            - <input type="text" style="width:55px; display: inline-block; " class="form-control input-sm"  name="sufixo" id="sufixo" placeholder="Apelido" value="{{$telefone->sufixo}}">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="apelido" class="col-sm-6 control-label">Descrição: </label>
                        <div class="col-sm-offset-6">
                            <select name="descrição" class="form-control"  style="width: 80%">
                                @foreach($descrições as $descrição)
                                <option value="{{$descrição->descrição}}" @if($telefone->descrição == $descrição->descrição) selected=selected @endif>{{$descrição->descrição}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="col-sm-offset-6">
                            <button type="submit" class="btn btn-primary">Alterar</button>
                            <a href="/{{$pessoa->index}}" class="btn btn-primary">Voltar ao índice</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @include('pieces.contatos', ['pessoa'=>$pessoa])

            </div>
        </div>
    </div>
</div>
@endsection

