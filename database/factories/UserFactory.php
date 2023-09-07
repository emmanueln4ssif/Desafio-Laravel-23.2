<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        $nome = $faker->name;
        $nome_email = strtolower(str_replace(' ', '', $nome));
        $nome_email = str_replace('.', '', $nome_email);
        return [
            'name' => $nome,
            'email' => $nome_email.'@vetcenter.br',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'data_nascimento' => fake()->date($format = 'Y-m-d', $max = '- 25 years'),
            'periodo_trabalho' => fake()->randomElement(['Diurno', 'Noturno', 'Integral']),
            'rua' => $faker->streetName(),
            'numero' => $faker->buildingNumber(),
            'cidade' => $faker->city(),
            'uf' => $faker->stateAbbr(),
            'bairro' => $faker->cityPrefix(),
            'pais' => 'Brasil',
            'cep' => $faker->postcode(),
            'telefone' => $faker->landline(),
            'ddd' => $faker->areaCode(),
            'remember_token' => Str::random(10),
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
