@extends('layout')
@section('content')
<div class="row center-block pessoa-edit">
    <div class="panel @if($pessoa->sexo == 'm') panel-info @else panel-danger @endif">
        <div class="panel-heading">
            <h3 class="panel-title">
                Editar Contato
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
                <form class="form-horizontal" action='{{route('pessoa.update',['id'=>$pessoa->id])}}' method="POST">

                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">Nome: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{$pessoa->nome}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apelido" class="col-sm-2 control-label">Apelido: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="apelido" id="apelido" placeholder="Apelido" value="{{$pessoa->apelido}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sexo" value="F" @if($pessoa->sexo == 'f') checked @else teste @endif >
                                           <i class="fa fa-female" ></i>
                                </label>
                                <br />
                                <label>
                                    <input type="radio" name="sexo" value="M"  @if($pessoa->sexo == 'm') checked @else teste @endif >
                                           <i class="fa fa-male"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-7">
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
            </div>
        </div>
    </div>
</div>
@endsection
