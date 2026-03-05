<?php

use App\Models\Event;
use App\Models\Registration;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('event can be created with factory', function () {
    $event = Event::factory()->create(['title' => 'Test Workshop', 'total_seats' => 30]);

    expect($event->title)->toBe('Test Workshop')
        ->and($event->total_seats)->toBe(30);
});

test('available seats returns correct count', function () {
    $event = Event::factory()->create(['total_seats' => 30]);

    expect($event->availableSeats())->toBe(30);

    $users = User::factory()->count(5)->create();
    foreach ($users as $user) {
        Registration::create(['user_id' => $user->id, 'event_id' => $event->id]);
    }

    expect($event->fresh()->availableSeats())->toBe(25);
});

test('is full returns true when no seats remain', function () {
    $event = Event::factory()->create(['total_seats' => 2]);
    $users = User::factory()->count(2)->create();

    foreach ($users as $user) {
        Registration::create(['user_id' => $user->id, 'event_id' => $event->id]);
    }

    expect($event->fresh()->isFull())->toBeTrue();
});

test('is full returns false when seats remain', function () {
    $event = Event::factory()->create(['total_seats' => 5]);

    expect($event->isFull())->toBeFalse();
});

test('event has registrations relationship', function () {
    $event = Event::factory()->create(['total_seats' => 10]);
    $user = User::factory()->create();

    Registration::create(['user_id' => $user->id, 'event_id' => $event->id]);

    expect($event->registrations)->toHaveCount(1);
});
