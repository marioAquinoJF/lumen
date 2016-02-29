<?php

namespace CodeAgenda\Entities;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    protected $table = 'pessoas';
    protected $fillable = ['nome', 'apelido', 'sexo', 'index'];

    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }

    //  public function getIndexAttribute()
    //   {
    //     return strtoupper(substr(trim($this->apelido),0,1));
    //  }


}
