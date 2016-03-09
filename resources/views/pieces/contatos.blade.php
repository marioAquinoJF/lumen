
<div class="panel @if($pessoa->sexo == 'm') panel-info @else panel-danger @endif">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span>
                @if($pessoa->sexo == 'm')
                <i  class="fa fa-male" style="color:#0066cc;"></i>
                @else
                <i  class="fa fa-female"  style="color:#9c359c;"></i>
                @endif

            </span>
            <span>{{ $pessoa->apelido }}</span>
            <span class="pull-right">
                <a href="{{ route('pessoa.edit', ['id'=>$pessoa->id]) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="{{ route('pessoa.delete', ['id'=>$pessoa->id]) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Apagar"><i class="fa fa-minus-circle"></i></a>

            </span>
        </h3>
    </div>
    <div class="panel-body contato">
        <h3>{{ $pessoa->nome }}</h3>

        <ul class="nav nav-tabs" >
            @if($telefone)
            <li class="active">
                <a href="javascript:void(0);"  data-toggle="tab" data-target="#telefones_{{$pessoa->id}}">Telefones</a>                
            </li>
            @endif
            @if($email)            
            <li @if(!$telefone) class="active" @endif>
                <a  href="javascript:void(0);" data-toggle="tab" data-target="#emails_{{$pessoa->id}}">E-mails</a>
            </li>
            @endif
        </ul>  
        <div class="tab-content">
            @if($telefone)
            <div id="telefones_{{$pessoa->id}}" class="tab-pane fade in active">
                @include('pieces.telefones',['telefones'=>$pessoa->telefones])
            </div>
            @endif
            @if($email)
            <div id="emails_{{$pessoa->id}}" class="tab-pane fade @if(!$telefone) in active @endif">
                @include('pieces.emails',['emails'=>$pessoa->emails])
            </div>
            @endif
        </div>        
    </div>
</div>
<style>
    .nav .nav-tabs a:link{ cursor: pointer;}
</style>