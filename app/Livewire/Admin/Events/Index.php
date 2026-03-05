<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin')]
#[Title('จัดการ Events — Admin')]
class Index extends Component
{
    public bool $showDeleteModal = false;

    public ?int $deletingEventId = null;

    /** @var \Illuminate\Database\Eloquent\Collection<int, Event> */
    public $events;

    public function mount(): void
    {
        $this->loadEvents();
    }

    public function loadEvents(): void
    {
        $this->events = Event::withCount('registrations')->latest()->get();
    }

    public function confirmDelete(int $eventId): void
    {
        $this->deletingEventId = $eventId;
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->deletingEventId = null;
        $this->showDeleteModal = false;
    }

    public function deleteEvent(): void
    {
        if ($this->deletingEventId) {
            Event::findOrFail($this->deletingEventId)->delete();
            session()->flash('success', 'ลบกิจกรรมเรียบร้อยแล้ว');
        }

        $this->cancelDelete();
        $this->loadEvents();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.events.index');
    }
}
