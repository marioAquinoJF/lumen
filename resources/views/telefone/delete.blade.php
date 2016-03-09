@extends('layout')
@section('content')
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                Excluir Telefone
            </h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <h3>
                    Deseja realmente apagar este telefone?<br/>
                    <small>{{$telefone->descrição}}: {{ $telefone->numero }}</small>
                </h3>
                <form class="form-horizontal" action='{{route('telefone.destroy',['id'=>$telefone->pessoa->id,'telefoneId'=>$telefone->id])}}' method="post">
                    <input type="hidden" name="_method" value="DELETE" />
                    <div class="form-group col-sm-12">
                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-danger">Apagar</button>
                            <a href="{{ route('agenda.index') }}" class="btn btn-primary">voltar</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">

                @include('pieces.contatos')
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


