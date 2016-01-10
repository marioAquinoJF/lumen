<?php

namespace MHProj\Entities;

use Illuminate\Database\Eloquent\Model;

class Pessoa {

    protected $table = 'pessoas';
    protected $fillable = ['idade','sexo'];

}
