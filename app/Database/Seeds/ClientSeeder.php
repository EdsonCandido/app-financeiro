<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) { //to add 10 clients. Change limit as desired
            $this->db->table('client')->insert($this->generateClient());
        }
    }
    private function generateClient(): array
    {
        $faker = Factory::create();
        return [
            'nome' => $faker->name(),
            'email' => $faker->email,
            'documento' => random_int(100000000000, 1000000000000),
            'cep' => random_int(1000000, 100000000),
            'telefone' => random_int(10000000, 100000000),
            'rua' => $faker->address(),
            'bairro' => $faker->address(),
            'cidade' => $faker->city(),
            'estado' => $faker->regexify('[A-Z]{2}'),
            'ativo' => 1,
        ];
    }
}
