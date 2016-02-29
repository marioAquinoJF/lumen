<?php

namespace CodeAgenda\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
                \CodeAgenda\Repositories\PessoaRepository::class, \CodeAgenda\Repositories\PessoaRepositoryEloquent::class
        );
        $this->app->bind(
                \CodeAgenda\Repositories\TelefoneRepository::class, \CodeAgenda\Repositories\TelefoneRepositoryEloquent::class
        );
    }
}
