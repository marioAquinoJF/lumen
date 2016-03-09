@extends('layout')
@section('content')
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                Excluir Contato
            </h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <h3>Deseja realmente apagar este contato?</h3>
                <form action='{{route('pessoa.destroy',['id'=>$pessoa->id])}}' method="post">
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="submit" class="btn btn-danger">Apagar</button>
                    <a href="{{ route('agenda.index') }}" class="btn btn-primary">voltar</a>
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
                @include('pieces.contatos')
            </div>
        </div>
    </div>
</div>
@endsection


