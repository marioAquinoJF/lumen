<?php

use Illuminate\Database\Seeder;

class PessoaEmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CodeAgenda\Entities\PessoaEmail::class,80)->create();
    }
}
