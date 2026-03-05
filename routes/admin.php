<?php

use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', Admin\Dashboard::class)->name('dashboard');
Route::get('/events', Admin\Events\Index::class)->name('events.index');
Route::get('/events/create', Admin\Events\Create::class)->name('events.create');
Route::get('/events/{event}/edit', Admin\Events\Edit::class)->name('events.edit');
Route::get('/events/{event}/registrations', Admin\Events\Registrations::class)->name('events.registrations');
