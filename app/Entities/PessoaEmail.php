<?php

namespace CodeAgenda\Entities;

use Illuminate\Database\Eloquent\Model;

class PessoaEmail extends Model
{

    protected $table = 'pessoa_emails';
    protected $fillable = ['pessoa_id', 'email'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

}
