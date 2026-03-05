<?php

use App\Models\Event;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('home page loads successfully', function () {
    $this->get(route('home'))->assertOk();
});

test('home page shows events', function () {
    Event::factory()->create(['title' => 'React Workshop', 'total_seats' => 30]);
    Event::factory()->create(['title' => 'Python ML Workshop', 'total_seats' => 25]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('React Workshop')
        ->assertSee('Python ML Workshop');
});
