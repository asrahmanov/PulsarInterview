<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description'=> $this->faker->text(30),
            'business_id'=> $this->faker->numerify('###-#####'),
            'external_id'=> $this->faker->numerify('##-#####'),
            'internal_id'=> $this->faker->numerify('######-##'),
            'status'=> $this->faker->randomElement(['closed','done','hot','opened','pending']),
            'secondary_status'=> $this->faker->randomElement(['archive','case_archive','mixed','prospective']),
            'init_date'=>$this->faker->date(),
            'start_date'=>$this->faker->date(),
            'end_date'=>$this->faker->date(),
            'count_of_cases'=>$this->faker->randomDigitNotZero(),
            'created_at'=>$this->faker->dateTime(),
            'updated_at'=>now(),
        ];
    }

}
