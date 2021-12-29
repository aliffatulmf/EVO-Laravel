<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Admin\Candidate;

class CandidateFactory extends Factory
{
    protected $model = Candidate::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->unique()->randomDigit(),
            'position' => $this->faker->jobTitle(),
            'address' => $this->faker->country(),
            'name' => $this->faker->username(),
            'image' => 'https://caps.team/assets/img/merchandise/test1.png',
            'video' => $this->faker->unique()->randomElement([
                'OAEZIuRSQ_M', 'Z49CzDIOxMI'
            ]),
            'description' => $this->faker->text()
        ];
    }
}
