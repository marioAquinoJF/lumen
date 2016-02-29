@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 btn-row">
        <a href="#" class="btn btn-primary">Novo Contato</a>

    </div>
</div>
<div class="row">
    @if(is_string($data['pessoas']))
    <h2>{{ $data['pessoas'] }}</h2>
    @else
    @foreach($data['pessoas'] as $pessoa)
    <div class="col-md-6">
        @include('pieces.contatos')
    </div>

    @endforeach
    @endif
</div>
@endsection
