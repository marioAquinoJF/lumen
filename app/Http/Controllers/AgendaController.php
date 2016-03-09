<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Pessoa;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public function index($letra = 'A')
    {
        $pessoas = Pessoa::where('apelido', 'like', $letra . '%')->get();
        $data = ['pessoas' => $pessoas, 'search' => ''];
        $email = true;
        $telefone = true;
        return view('agenda', compact('data', 'email', 'telefone'));
    }

    public function search(Request $request)
    {
        $pessoas = null;
        $search = trim($request->search) === '' ? false : trim($request->search);
        if ($search) {
            $pessoas = Pessoa::where('apelido', 'like', '%' . $search . '%')
                    ->where('nome', 'like', '%' . $search . '%')
                    ->distinct()
                    ->orderBy('apelido')
                    ->get();
        } else {
            return redirect('/A');
        }
        $data = ['pessoas' => (count($pessoas) === 0 ? 'Nenhuma pessoa encontrada' : $pessoas), 'search' => $search];

        $email = true;
        $telefone = true;
        return view('agenda', compact('data', 'email', 'telefone'));
    }

}
