<p><a href="{{route('email.create',['id'=>$pessoa->id])}}" class="label label-primary">Novo E-mail</a></p>
<table class="table table-hover">
    @foreach($emails as $email)
    <tr>
        <td>
            {{ $email->email }}
        </td>
        <td>
            <a href="{{ route('email.edit',['id'=>$pessoa->id,'emailId'=>$email->id]) }}" class="text-primary"  data-toggle="tooltip" data-placement="top" title="Editar">
                <i class="fa fa-edit"></i>
            </a>&nbsp;&nbsp;&nbsp;
            <a href="{{ route('email.destroy',['id'=>$pessoa->id,'emailId'=>$email->id]) }}" class="text-danger"  data-toggle="tooltip" data-placement="top" title="Apagar">
                <i class="fa fa-minus-circle"></i>
            </a>
        </td>
    </tr>
    @endforeach
</table>

