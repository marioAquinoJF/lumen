<p><a href="{{route('telefone.create',['id'=>$pessoa->id])}}" class="label label-primary">Novo Telefone</a></p>
<table class="table table-hover">
    @foreach($telefones as $telefone)
    <tr>
        <td>
            {{ $telefone->descrição }}
        </td>
        <td>
            {{ $telefone->numero }}
        </td>
        <td>
            <a href="{{ route('telefone.edit',['id'=>$pessoa->id,'telefoneId'=>$telefone->id]) }}" class="text-primary"  data-toggle="tooltip" data-placement="top" title="Editar">
                <i class="fa fa-edit"></i>
            </a>&nbsp;&nbsp;&nbsp;
            <a href="{{ route('telefone.destroy',['id'=>$pessoa->id,'telefoneId'=>$telefone->id]) }}" class="text-danger"  data-toggle="tooltip" data-placement="top" title="Apagar">
                <i class="fa fa-minus-circle"></i>
            </a>
        </td>
    </tr>
    @endforeach
</table>

