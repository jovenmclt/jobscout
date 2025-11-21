<?php

namespace Database\Factories;

use App\Models\Job_list;
use Illuminate\Database\Eloquent\Factories\Factory;

class Job_listFactory extends Factory
{
    protected $model = Job_list::class;

    public function definition(): array
    {
        return [
            'job_title' => $this->faker->randomElement([
                'Store Staff',
                'Barista',
                'Cashier',
                'Kitchen Helper',
                'Food Packer',
                'Service Crew',
                'Delivery Rider',
                'Quality Checker',
                'Assistant Baker',
                'Dishwasher',
            ]),

            'salary' => $this->faker->numberBetween(10000, 18000),
            'location' => $this->faker->randomElement([
                'San Fernando, Pampanga',
                'Apalit, Pampanga',
                'Mexico, Pampanga',
                'Bacolor, Pampanga',
                'Makati',
                'Taguig',
            ]),

            'type' => $this->faker->randomElement(['Full-time', 'Part-time']),
            'description' => $this->faker->sentence(10),
            'status' => 1,
        ];
    }
}
