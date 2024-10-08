<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // dd(
        //     collect(fake()->words(4))->join(' ')
        // );


        return [
            'title' => collect(fake()->words(4))->join(' '),
            'description' => fake()->randomHtml(),
            'ends_at' => fake()->dateTimeBetween('now', '+ 3 days'),
            'status' => fake()->randomElement(['open', 'close']),
            'tech_stack' => fake()->randomElements(['react', 'php', 'laravel', 'vue', 'tailwind', 'typescript', 'java', 'dart', 'flutter', 'nextjs', 'python'], random_int(1, 5)),
            'created_by' => User::factory(),
        ];
    }
}