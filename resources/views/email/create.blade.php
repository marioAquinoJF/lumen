@extends('layout')
@section('content')
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                Novo E-mail
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
                <form class="form-horizontal" action='{{route('email.store',['id'=>$pessoa->id])}}' method="post">
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">E-mail: </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Adicionar</button>
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
