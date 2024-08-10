<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 week'),
            'assignBy_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'priority_id' => $this->faker->randomElement([1, 2, 3, 4]),
        ];
    }
}
