<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use App\Models\Registration;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin')]
#[Title('Dashboard — Admin')]
class Dashboard extends Component
{
    public int $totalEvents;

    public int $totalRegistrations;

    public int $totalUsers;

    public int $fullEvents;

    /** @var \Illuminate\Database\Eloquent\Collection<int, Event> */
    public $events;

    public function mount(): void
    {
        $this->events = Event::withCount('registrations')->get();
        $this->totalEvents = $this->events->count();
        $this->totalRegistrations = Registration::count();
        $this->totalUsers = User::where('role', 'user')->count();
        $this->fullEvents = $this->events->filter(fn ($e) => $e->registrations_count >= $e->total_seats)->count();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.dashboard');
    }
}
