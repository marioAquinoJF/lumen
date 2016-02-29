
<div class="panel panel-default">
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
                <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                <a href="{{ url() }}/pessoa/{{ $pessoa->id }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Apagar"><i class="fa fa-minus-circle"></i></a>
            </span>
        </h3>
    </div>
    <div class="panel-body">
        <h3>{{ $pessoa->nome }}</h3>

        <table class="table table-hover">
            @foreach($pessoa->telefones as $telefone)
            <tr>
                <td>
                    {{ $telefone->descrição }}
                </td>
                <td>

                    {{ $telefone->numero }}
                </td>
                <td>
                    <a href="telefone/{{ $telefone->id }}" class="text-danger"  data-toggle="tooltip" data-placement="top" title="Apagar"><i class="fa fa-minus-circle"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>