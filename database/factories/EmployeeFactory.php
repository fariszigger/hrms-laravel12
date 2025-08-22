<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'employee_id' => 'EMP-' . $this->faker->unique()->numerify('#####'),
            'code' => strtoupper(Str::random(6)),
            'user_id' => Str::uuid(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'pob' => $this->faker->city(),
            'dob' => $this->faker->date('Y-m-d', '-20 years'),
            'married' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed']),

            'emergency_contact_name' => $this->faker->name(),
            'emergency_contact_phone' => $this->faker->phoneNumber(),
            'emergency_contact_relationship' => $this->faker->randomElement(['spouse', 'parent', 'friend']),

            'department_id' => rand(1, 3), // make sure department exists
            'position_id' => rand(1, 3),   // make sure position exists
            'employee_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract']),
            'hire_date' => $this->faker->date(),
            'salary' => $this->faker->numberBetween(3000000, 15000000),
            'bonus' => $this->faker->numberBetween(0, 2000000),
            'status' => $this->faker->randomElement(['active', 'inactive', 'on-leave']),
            'termination_date' => null,

            'education' => $this->faker->sentence(),
            'previous_employment' => $this->faker->company(),
            'skills' => implode(', ', $this->faker->words(5)),
            'performance_reviews' => $this->faker->paragraph(),
            'notes' => $this->faker->sentence(),
            'mother_name' => $this->faker->name('female'),

            'ktp_number' => $this->faker->unique()->numerify('##########'),
            'kk_number' => $this->faker->numerify('##########'),
            'sim_number' => $this->faker->unique()->numerify('##########'),
            'npwp_number' => $this->faker->unique()->numerify('##.###.###.#-###.###'),
            'bpjskes_number' => $this->faker->numerify('##########'),
            'bpjsket_number' => $this->faker->numerify('##########'),

            'photo_path' => 'photos/employees/' . $this->faker->uuid . '.jpg',
        ];
    }
}
