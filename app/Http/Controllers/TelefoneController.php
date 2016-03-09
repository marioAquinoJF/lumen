<?php

namespace CodeAgenda\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use CodeAgenda\Entities\Telefone;
use CodeAgenda\Entities\Pessoa;

class TelefoneController extends Controller
{

    public function create($id)
    {
        $pessoa = Pessoa::find($id);
        $descrições = $this->getDescricao();
        $telefone = true;
        $email = false;
        return view('telefone.create', compact('telefone', 'pessoa', 'descrições', 'email'));
    }

    public function edit($id, $telefoneId)
    {

        $telefone = Telefone::find($telefoneId);
        $pessoa = $telefone->pessoa;
        $descrições = $this->getDescricao();
        $email = false;
        return view('telefone.edit', compact('telefone', 'pessoa', 'descrições', 'email'));
    }

    public function update($id, $telefoneId, Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'cod_país' => 'required|integer',
                    'ddd' => 'required|integer',
                    'prefixo' => 'required|integer',
                    'sufixo' => 'required|integer',
                    'cod_país' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect("contato/{$id}/telefone/{$telefoneId}/editar")
                            ->withErrors($validator)
                            ->withInput();
        }
        $telefone = Telefone::find($telefoneId);
        $telefone->fill($request->all())->save();
        $request->session()->flash('data', 'Telefone atualizado com sucesso!');
        return redirect("contato/{$id}/telefone/{$telefoneId}/editar");
    }

    public function store($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'cod_país' => 'required|integer',
                    'ddd' => 'required|integer',
                    'prefixo' => 'required|integer',
                    'sufixo' => 'required|integer',
                    'cod_país' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect("contato/{$id}/telefone/novo")
                            ->withErrors($validator)
                            ->withInput();
        }
        $t = array_merge($request->all(), ['pessoa_id' => $id]);
        $telefone = Telefone::create($t);
        $request->session()->flash('data', 'Telefone adicionado com sucesso!');
        return redirect("contato/{$id}/telefone/{$telefone->id}/editar");
    }

    public function delete($id, $telefoneId)
    {
        $telefone = Telefone::find($telefoneId);
        $pessoa = $telefone->pessoa;
        $email = false;
        return view('telefone.delete', compact('telefone', 'pessoa', 'email'));
    }

    public function destroy($id, $telefoneId)
    {
        Telefone::find($telefoneId)->delete();
        $pessoa = Pessoa::find($id);

        return redirect("/$pessoa->index");
    }

    public function getDescricao()
    {
        return Telefone::select('descrição')->distinct()->orderBy('descrição')->get();
    }

}
