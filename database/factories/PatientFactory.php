<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'patronymic' => $this->faker->lastName,
            'birth_date'=> $this->faker->date('Y-m-d','2000-01-01'),
            'sex'=> $this->faker->randomElement([null,'male','female']),
            'created_at'=>$this->faker->dateTime(),
            'updated_at'=>now(),
        ];
    }

}
