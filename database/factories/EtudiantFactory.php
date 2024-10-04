<?php

namespace Database\Factories;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     * pro
     * @return array<string, mixed>
     */
        protected $model = Etudiant::class;
    public function definition(): array
    {
        return [
            'nom'=>$this->faker->lastName(),
            'prenom'=>$this->faker->firstName(),
            'classes_id'=> rand(1,6),
        ];
    }
}
