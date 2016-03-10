<?php

namespace CodeAgenda\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use CodeAgenda\Entities\Pessoa;

class PessoaController
{

    public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoa.edit', compact('pessoa'));
    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::find($id);
        $validator = Validator::make($request->all(), [
                    'nome' => 'required|min:3|max:255|unique:pessoas,nome,' . $pessoa->id,
                    'apelido' => 'required|min:2|max:50',
                    'sexo' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect("contato/{$pessoa->id}/editar")
                            ->withErrors($validator)
                            ->withInput();
        }

        if ($pessoa->fill(array_merge($request->all(), ['index' => $this->getIndex($request->apelido)]))->save()):
            $request->session()->flash('data', 'Contato atualizado com sucesso!');
        endif;
        return redirect("contato/{$pessoa->id}/editar");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'nome' => 'required|min:3|max:255|unique:pessoas',
                    'apelido' => 'required|min:2|max:50',
                    'sexo' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('contato/novo')
                            ->withErrors($validator)
                            ->withInput();
        }
        $pessoa = Pessoa::create(array_merge($request->all(), ['index' => $this->getIndex($request->apelido)]));
        if ($pessoa):
            $request->session()->flash('data', 'Contato criado com sucesso!');
        endif;
        return redirect("contato/{$pessoa->id}/editar");
    }

    public function create()
    {
        return view('pessoa.create');
    }

    public function delete($id)
    {
        $pessoa = Pessoa::find($id);
        $data = ['pessoa' => $pessoa,'telefone'=>false,'email'=>false];
        return view('pessoa.delete', $data);
    }

    public function destroy($id)
    {
        Pessoa::find($id)->delete();
        return redirect('/A');
    }

    public function getIndex($nome)
    {
        $letter = strtoupper(substr(trim($nome), 0, 1));
        $vogais = ['A' => ['/Á/', '/À/', '/Ä/', '/Â/', '/Ã/'],
            'I' => ['/Í/', '/Ì/', '/Ï/', '/Î/'],
            'E' => ['/É/', '/È/', '/Ë/', '/Ê/'],
            'O' => ['/Ó/', '/Ò/', '/Ö/', '/Ô/', '/Õ/'],
            'U' => ['/Ú/', '/Ù/', '/Ü/', '/Û/']
        ];
        $r = '';
        foreach ($vogais as $key => $vogal) {
            $r = preg_replace($vogal, $key, $letter);
            if ($letter != $r) {
                return $r;
            }
        }
        return !$r ? $letter : $r;
    }

}
