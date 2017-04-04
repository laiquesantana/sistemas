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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'cpf' => $faker->numberBetween(00000000000, 99999999999),
        'endereco' => $faker->name,
        'telefone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'perfil' => $faker->randomElement(['user', 'funcionario','admin']),
        'remember_token' => $faker->randomNumber,
    ];
});

$factory->define(App\Veiculo::class, function (Faker\Generator $faker) {


    return [
        'ano' => $faker->numberBetween(2010, 2080),
        'modelo' => $faker->randomElement(['Hennessey Venom GT', 'Aston Martin One','Arash AF10 Hybrid','Zenvo ST','Koenigsegg Regera','Pagani Huayra Roadster','La Ferrari Aperta ','Bugatti Veyron Supersport','Bugatti Chiron','Aston Martin MA-RB00']),
        'marca' => $faker->randomElement(['nissan','toyota','ferrari','porsche','subaru','bmw','honda','mercedes-benz','audi','lexus']),
        'placa' => $faker->randomElement(['XXT-8898', 'YYZ-6666','WTF-6665']),
        'ativo' => 1,
        'valor_aluguel' =>$faker->numberBetween(50, 450),
        'cor' => $faker->randomElement(['branco', 'azul','vermelho','preto']),

    ];
});

