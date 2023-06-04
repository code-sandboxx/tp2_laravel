<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;
use App\Models\Ville;
use Carbon\Carbon;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $minBirthdate = Carbon::now()->subYears(17)->format('Y-m-d');      

        return [
            'nom'=>$this->faker->name,
            'adresse'=>$this->faker->address,
            'phone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->unique()->email,
            'date_de_naissance'=>$this->faker->dateTimeBetween($minBirthdate, 'now')->format('Y-m-d'),
            'ville_id' => Ville::inRandomOrder()->first()->id,
        ];
    }
}
