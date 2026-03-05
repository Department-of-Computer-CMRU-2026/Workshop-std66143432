<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.workshop')]
class Home extends Component
{
    /** @var Collection<int, Event> */
    public Collection $events;

    public function mount(): void
    {
        $this->loadEvents();
    }

    public function loadEvents(): void
    {
        $this->events = Event::withCount('registrations')->get();
    }

    public function register(int $eventId): void
    {
        if (! auth()->check()) {
            $this->redirectRoute('login');

            return;
        }

        $event = Event::findOrFail($eventId);

        if ($event->isFull()) {
            session()->flash('error', 'ขออภัย หัวข้อนี้มีผู้ลงทะเบียนครบแล้ว');

            return;
        }

        $alreadyRegistered = auth()->user()->registrations()->where('event_id', $eventId)->exists();

        if ($alreadyRegistered) {
            session()->flash('error', 'คุณได้ลงทะเบียนหัวข้อนี้ไปแล้ว');

            return;
        }

        auth()->user()->registrations()->create(['event_id' => $eventId]);

        session()->flash('success', 'ลงทะเบียนสำเร็จ! 🎉');

        $this->loadEvents();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.home');
    }
}
