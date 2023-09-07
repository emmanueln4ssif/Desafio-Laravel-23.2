<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proprietario>
 */
class ProprietarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function geradorDeCPF(){

        $faker = \Faker\Factory::create('pt_BR');
        $cpf = $faker->unique()->numerify('#########-##');

        return $cpf;
    }

    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        $nome = $faker->name;
        $nome_email = strtolower(str_replace(' ', '', $nome));
        $nome_email = str_replace('.', '', $nome_email);

        return [
            'nome' => $nome,
            'email' => $nome_email.'@gmail.com',
            'data_nascimento' => fake()->date($format = 'Y-m-d', $max = '- 25 years'),
            'rua' => $faker->streetName(),
            'numero' => $faker->buildingNumber(),
            'cidade' => $faker->city(),
            'uf' => $faker->stateAbbr(),
            'bairro' => $faker->cityPrefix(),
            'pais' => 'Brasil',
            'cep' => $faker->postcode(),
            'telefone' => $faker->landline(),
            'ddd' => $faker->areaCode(),
            'cpf' => $this->geradorDeCPF()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
