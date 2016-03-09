<?php

namespace CodeAgenda\Entities;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{

    protected $table = 'telefones';
    protected $fillable = ['descrição', 'cod_país', 'sufixo', 'prefixo', 'ddd', 'pessoa_id'];

    public function getNumeroAttribute()
    {
        return "{$this->cod_país} ({$this->ddd}) {$this->prefixo} - {$this->sufixo}";
    }

    public function pessoa()
    {
        return $this->BelongsTo(Pessoa::class);
    }

}
