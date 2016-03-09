<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/*
$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});
*/
if(!function_exists('convertInIndex')){
    function convertInIndex($letter)
    {
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
$factory->define(CodeAgenda\Entities\Pessoa::class, function ($faker) {
    $name = $faker->name;
    return [
        'nome' => $name,
        'apelido' => $name,
        'sexo' => strtoupper($faker->randomElement(['M','F'])),
        'index'=> convertInIndex(strtoupper(substr(trim($name),0,1))) 
    ];
});

$factory->define(CodeAgenda\Entities\Telefone ::class, function ($faker) {
    return [
        'descrição' => $faker->randomElement(['Comercial','Residencial','Celular','Recados']),
        'cod_país' => $faker->optional(0.7,55)->numberBetween(1, 197),
        'ddd' => $faker->numberBetween(11, 91),
        'prefixo' => $faker->randomNumber(4),
        'sufixo' => $faker->randomNumber(4),
        'pessoa_id' => $faker->numberBetween(1,30)
    ];
});

$factory->define(CodeAgenda\Entities\PessoaEmail::class, function ($faker) {
    return [
        'email' => $faker->email,
        'pessoa_id' => rand(1,30),
    ];
});
