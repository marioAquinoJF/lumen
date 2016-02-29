@extends('layout')
@section('content')
<div class="row">
    @if(is_string($pessoas))
    {{ $pessoas }}
    @else
    @foreach($pessoas as $pessoa)
    <div class="col-md-6">
        @include('pieces.contatos')
    </div>
    @endforeach
    @endif
</div>
@endsection
