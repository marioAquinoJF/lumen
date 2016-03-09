@extends('layout')
@section('content')
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                Novo Contato
            </h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form class="form-horizontal" action='{{route('pessoa.store')}}' method="post">
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">Nome: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{old('nome')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apelido" class="col-sm-2 control-label">Apelido: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="apelido" id="apelido" placeholder="Apelido" value="{{old('apelido')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sexo" value="F" {{ (old('sexo') == 'F' ? 'checked' : '') }} />
                                    <i class="fa fa-female" ></i>
                                </label>
                                <br />
                                <label>
                                    <input type="radio" name="sexo" value="M"  {{ (old('sexo') == 'M' ? 'checked' : '') }} />
                                    <i class="fa fa-male"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Salvar</button>
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
            </div>
        </div>
    </div>
</div>
@endsection
