<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Modern Web Development with React & Next.js',
                'speaker' => 'อ.สมชาย มั่นคง',
                'location' => 'ห้อง A101',
                'total_seats' => 30,
            ],
            [
                'title' => 'Introduction to Machine Learning with Python',
                'speaker' => 'อ.สุดา วิสุทธิ์',
                'location' => 'ห้อง B202',
                'total_seats' => 25,
            ],
            [
                'title' => 'DevOps & CI/CD Pipeline Fundamentals',
                'speaker' => 'อ.กิตติ ศรีสุข',
                'location' => 'ห้อง Lab 1',
                'total_seats' => 20,
            ],
            [
                'title' => 'API Design and RESTful Best Practices',
                'speaker' => 'อ.นภา ทองดี',
                'location' => 'ห้อง C303',
                'total_seats' => 35,
            ],
            [
                'title' => 'Cybersecurity Essentials for Developers',
                'speaker' => 'อ.วรพล รักษาดี',
                'location' => 'ห้องประชุมใหญ่',
                'total_seats' => 50,
            ],
            [
                'title' => 'Mobile App Development with Flutter',
                'speaker' => 'อ.พิมพ์ใจ ชัยวัฒน์',
                'location' => 'ห้อง Lab 2',
                'total_seats' => 25,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
