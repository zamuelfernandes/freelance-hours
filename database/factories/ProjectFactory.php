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
        return [
            'title' => collect(fake()->words(4))->join(' '),
            'description' => 'oi',
            // fake()->randomHtml(),
            'ends_at' => fake()->dateTimeBetween('now', '+ 3 days'),
            'status' => fake()->randomElement(['open', 'closed']),
            'tech_stack' => fake()->randomElements([
                'nodejs',
                'react',
                'javascript',
                'vite',
                'nextjs',
                'flutter',
                'php',
                'laravel',
                'vue',
                'tailwind',
                'typescript',
                'java',
                'dart',
                'python',
            ], random_int(1, 4)),
            'created_by' => User::factory(),
        ];
    }
}
