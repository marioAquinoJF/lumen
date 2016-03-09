@extends('layout')
@section('content')
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                Novo Telefone
            </h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6">

                <form class="form-horizontal" action='{{route('telefone.store',['id'=>$pessoa->id])}}' method="POST">
                    <div class="form-group col-sm-12">
                        <label for="cod_país" class="col-sm-6 control-label">Código do País: </label>
                        <div >
                            <input type="text" style="width:55px; " class="form-control input-sm" name="cod_país" id="cod_país" value="{{ old('cod_país') }}" >
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="ddd" class="col-sm-6 control-label">DDD: </label>
                        <div >
                            <input type="text" style="width:55px; " class="col-sm-12 form-control input-sm"  name="ddd" id="ddd" value="{{old('ddd')}}">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="prefixo" class="col-sm-6 control-label">Número: </label>
                        <div >
                            <input type="text" style="width:55px; display: inline-block;" class="form-control input-sm"  name="prefixo" id="prefixo" value="{{old('prefixo')}}" >
                            - <input type="text" style="width:55px; display: inline-block; " class="form-control input-sm"  name="sufixo" id="sufixo" value="{{old('sufixo')}}">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="apelido" class="col-sm-6 control-label">Descrição: </label>
                        <div class="col-sm-offset-6">
                            <select name="descrição" class="form-control">
                                @foreach($descrições as $descrição)
                                <option value="{{$descrição->descrição}}" 
                                        @if(old('descrição') == $descrição->descrição) 
                                        selected=selected 
                                        @endif >
                                        {{$descrição->descrição}}
                                </option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" class="btn btn-primary center-block">Cadastrar</button>
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
            @if (session()->get('data'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session()->get('data') }}</li>
                </ul>
            </div>
            @endif
            @include('pieces.contatos', ['pessoa'=>$pessoa])

        </div>
    </div>
</div>
</div>
@endsection

