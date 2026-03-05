<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.workshop')]
class Home extends Component
{
    public const MAX_REGISTRATIONS = 3;

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

    #[Computed]
    public function userRegistrationCount(): int
    {
        if (! auth()->check()) {
            return 0;
        }

        return auth()->user()->registrations()->count();
    }

    #[Computed]
    public function userRegisteredEventIds(): array
    {
        if (! auth()->check()) {
            return [];
        }

        return auth()->user()->registrations()->pluck('event_id')->toArray();
    }

    public function register(int $eventId): void
    {
        if (! auth()->check()) {
            $this->redirectRoute('login');

            return;
        }

        if ($this->userRegistrationCount >= self::MAX_REGISTRATIONS) {
            session()->flash('error', 'คุณสามารถลงทะเบียนได้สูงสุด '.self::MAX_REGISTRATIONS.' หัวข้อเท่านั้น');

            return;
        }

        $event = Event::findOrFail($eventId);

        if ($event->isFull()) {
            session()->flash('error', 'ขออภัย หัวข้อนี้มีผู้ลงทะเบียนครบแล้ว');

            return;
        }

        if (in_array($eventId, $this->userRegisteredEventIds)) {
            session()->flash('error', 'คุณได้ลงทะเบียนหัวข้อนี้ไปแล้ว');

            return;
        }

        auth()->user()->registrations()->create(['event_id' => $eventId]);

        session()->flash('success', 'ลงทะเบียนสำเร็จ! 🎉');

        unset($this->userRegistrationCount, $this->userRegisteredEventIds);
        $this->loadEvents();
    }

    public function unregister(int $eventId): void
    {
        if (! auth()->check()) {
            $this->redirectRoute('login');

            return;
        }

        $deleted = auth()->user()->registrations()->where('event_id', $eventId)->delete();

        if ($deleted) {
            session()->flash('success', 'ยกเลิกการลงทะเบียนเรียบร้อยแล้ว');

            unset($this->userRegistrationCount, $this->userRegisteredEventIds);
            $this->loadEvents();
        }
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.home');
    }
}
