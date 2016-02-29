<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Telefone;

class TelefoneController extends Controller
{

    public function destroy($id)
    {
        Telefone::find($id)->delete();
        return redirect('/');
    }

}
