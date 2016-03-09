@extends('layout')
@section('content')
<div class="row">
    @if(is_string($data['pessoas']))
    <h2>{{ $data['pessoas'] }}</h2>
    @else
    @foreach($data['pessoas'] as $c => $pessoa)
        <div class="col-lg-6">
            @include('pieces.contatos')
        </div>
    @endforeach
    @endif
</div>
@endsection
