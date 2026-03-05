<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $topics = [
            'Modern Web Development with React & Next.js',
            'Introduction to Machine Learning with Python',
            'DevOps & CI/CD Pipeline Fundamentals',
            'API Design and RESTful Best Practices',
            'Database Optimization Techniques',
            'Cloud Architecture with AWS',
            'Cybersecurity Essentials for Developers',
            'Mobile App Development with Flutter',
        ];

        return [
            'title' => fake()->randomElement($topics),
            'speaker' => fake()->name(),
            'location' => fake()->randomElement(['ห้อง A101', 'ห้อง B202', 'ห้อง C303', 'ห้องประชุมใหญ่', 'ห้อง Lab 1', 'ห้อง Lab 2']),
            'total_seats' => fake()->numberBetween(20, 50),
        ];
    }
}
