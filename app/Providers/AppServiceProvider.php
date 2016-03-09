<?php

namespace CodeAgenda\Providers;

use Illuminate\Support\ServiceProvider;
use CodeAgenda\Entities\Pessoa;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        return view()->share(['letras' => $this->getIndice()]);
    }

    public function register()
    {

    }

    public function getIndice()
    {
        return Pessoa::select('index')->distinct()->orderBy('index', 'asc')->get();
    }

}
