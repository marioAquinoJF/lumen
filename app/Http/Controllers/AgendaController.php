<?php

namespace CodeAgenda\Http\Controllers;

use CodeAgenda\Entities\Pessoa;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public function index($letra = 'A')
    {
        $pessoas = Pessoa::where('apelido', 'like', $letra . '%')->get();
        $data = ['pessoas' => $pessoas, 'letras' => $this->getIndice(), 'search' => ''];
        return view('agenda', compact('data'));
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
        $letras = $this->getIndice();
        $data = ['pessoas' => (count($pessoas) === 0 ? 'Nenhuma pessoa encontrada' : $pessoas), 'letras' => $letras, 'search' => $search];
        return view('agenda', compact('data'));
    }

    public function getIndice()
    {
        return Pessoa::select('index')->distinct()->orderBy('index', 'asc')->get();
    }

    public function destroy($id)
    {
        Pessoa::find($id)->delete();
        return redirect('/');
    }

}
