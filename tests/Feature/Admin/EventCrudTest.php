<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Events\Create;
use App\Livewire\Admin\Events\Edit;
use App\Livewire\Admin\Events\Index;
use App\Models\Event;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guest is redirected from admin dashboard', function () {
    $this->get('/admin')->assertRedirect(route('login'));
});

test('non-admin user is forbidden from admin dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get('/admin')->assertForbidden();
});

test('admin can view dashboard', function () {
    $admin = User::factory()->admin()->create();
    \Livewire\Livewire::actingAs($admin)->test(Dashboard::class)->assertOk();
});

test('admin can view events list', function () {
    $admin = User::factory()->admin()->create();
    $event = Event::factory()->create(['title' => 'Test Workshop']);
    \Livewire\Livewire::actingAs($admin)->test(Index::class)->assertSee('Test Workshop');
});

test('admin can create an event', function () {
    $admin = User::factory()->admin()->create();

    \Livewire\Livewire::actingAs($admin)
        ->test(Create::class)
        ->set('title', 'New Workshop')
        ->set('speaker', 'อ.ทดสอบ')
        ->set('location', 'ห้อง A101')
        ->set('totalSeats', 25)
        ->call('save');

    expect(Event::where('title', 'New Workshop')->exists())->toBeTrue();
});

test('admin create event validates required fields', function () {
    $admin = User::factory()->admin()->create();

    \Livewire\Livewire::actingAs($admin)
        ->test(Create::class)
        ->call('save')
        ->assertHasErrors(['title', 'speaker', 'location']);
});

test('admin can edit an event', function () {
    $admin = User::factory()->admin()->create();
    $event = Event::factory()->create(['title' => 'Old Title']);

    \Livewire\Livewire::actingAs($admin)
        ->test(Edit::class, ['event' => $event])
        ->set('title', 'New Title')
        ->call('save');

    expect($event->fresh()->title)->toBe('New Title');
});

test('admin can delete an event', function () {
    $admin = User::factory()->admin()->create();
    $event = Event::factory()->create();

    \Livewire\Livewire::actingAs($admin)
        ->test(Index::class)
        ->call('confirmDelete', $event->id)
        ->call('deleteEvent');

    expect(Event::find($event->id))->toBeNull();
});
