<?php

namespace CodeAgenda\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use CodeAgenda\Entities\PessoaEmail;
use CodeAgenda\Entities\Pessoa;

class EmailController extends Controller
{

    public function create($id)
    {
        $pessoa = Pessoa::find($id);
        $email = true;
        $telefone = false;
        return view('email.create', compact('pessoa', 'email', 'telefone'));
    }

    public function edit($id, $emailId)
    {

        $email = PessoaEmail::find($emailId);
        $pessoa = $email->pessoa;
        $telefone = false;
        return view('email.edit', compact('pessoa', 'email', 'telefone'));
    }

    public function update($id, $emailId, Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|min:10|max:255|unique:pessoa_emails,email,' . $emailId,
        ]);

        if ($validator->fails()) {
            return redirect("contato/{$id}/email/{$emailId}/editar")
                            ->withErrors($validator)
                            ->withInput();
        }
        $email = PessoaEmail::find($emailId);
        $email->fill(array_merge($request->all()))->save();
        $request->session()->flash('data', 'E-mail atualizado com sucesso!');
        return redirect("contato/{$id}/email/{$emailId}/editar");
    }

    public function store($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|min:10|max:255|unique:pessoa_emails,email',
        ]);

        if ($validator->fails()) {
            return redirect("contato/{$id}/email/novo")
                            ->withErrors($validator)
                            ->withInput();
        }
        $t = array_merge($request->all(), ['pessoa_id' => $id]);
        $email = PessoaEmail::create($t);
        $request->session()->flash('data', 'E-mail adicionado com sucesso!');
        return redirect("contato/{$id}/email/{$email->id}/editar");
    }

    public function delete($id, $emailId)
    {
        $email = PessoaEmail::find($emailId);
        $pessoa = $email->pessoa;
        $telefone = false;
        return view('email.delete', compact('email', 'pessoa', 'telefone'));
    }

    public function destroy($id, $emailId)
    {
        PessoaEmail::find($emailId)->delete();
        $pessoa = Pessoa::find($id);
        return redirect("/$pessoa->index");
    }

}
