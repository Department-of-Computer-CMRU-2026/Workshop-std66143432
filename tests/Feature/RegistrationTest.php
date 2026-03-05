<?php

use App\Livewire\Home;
use App\Models\Event;
use App\Models\Registration;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('authenticated user can register for an event', function () {
    $user = User::factory()->create();
    $event = Event::factory()->create(['total_seats' => 30]);

    \Livewire\Livewire::actingAs($user)
        ->test(Home::class)
        ->call('register', $event->id);

    expect(Registration::where('user_id', $user->id)->where('event_id', $event->id)->exists())->toBeTrue();
});

test('user cannot register for the same event twice', function () {
    $user = User::factory()->create();
    $event = Event::factory()->create(['total_seats' => 30]);

    Registration::create(['user_id' => $user->id, 'event_id' => $event->id]);

    \Livewire\Livewire::actingAs($user)
        ->test(Home::class)
        ->call('register', $event->id);

    expect(Registration::where('user_id', $user->id)->where('event_id', $event->id)->count())->toBe(1);
});

test('user cannot register for a full event', function () {
    $user = User::factory()->create();
    $event = Event::factory()->create(['total_seats' => 1]);

    $otherUser = User::factory()->create();
    Registration::create(['user_id' => $otherUser->id, 'event_id' => $event->id]);

    \Livewire\Livewire::actingAs($user)
        ->test(Home::class)
        ->call('register', $event->id);

    expect(Registration::where('user_id', $user->id)->where('event_id', $event->id)->exists())->toBeFalse();
});

test('unauthenticated user is redirected when trying to register', function () {
    $event = Event::factory()->create(['total_seats' => 30]);

    \Livewire\Livewire::test(Home::class)
        ->call('register', $event->id)
        ->assertRedirect(route('login'));
});
