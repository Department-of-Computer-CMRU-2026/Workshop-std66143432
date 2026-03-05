<?php

use App\Livewire\Admin\Events\Registrations;
use App\Models\Event;
use App\Models\Registration;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('admin can view registrations for an event', function () {
    $admin = User::factory()->admin()->create();
    $event = Event::factory()->create(['total_seats' => 30]);
    $user = User::factory()->create(['name' => 'สมชาย ทดสอบ']);
    Registration::create(['user_id' => $user->id, 'event_id' => $event->id]);

    \Livewire\Livewire::actingAs($admin)
        ->test(Registrations::class, ['event' => $event])
        ->assertSee('สมชาย ทดสอบ');
});

test('admin sees correct registrations count for event', function () {
    $admin = User::factory()->admin()->create();
    $event = Event::factory()->create(['total_seats' => 30]);
    $users = User::factory()->count(3)->create();

    foreach ($users as $user) {
        Registration::create(['user_id' => $user->id, 'event_id' => $event->id]);
    }

    $component = \Livewire\Livewire::actingAs($admin)
        ->test(Registrations::class, ['event' => $event]);

    expect($component->get('registrations'))->toHaveCount(3);
});
