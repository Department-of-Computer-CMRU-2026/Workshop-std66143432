<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.admin')]
#[Title('แก้ไข Event — Admin')]
class Edit extends Component
{
    public Event $event;

    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|string|max:255')]
    public string $speaker = '';

    #[Validate('required|string|max:255')]
    public string $location = '';

    #[Validate('required|integer|min:1|max:500')]
    public int $totalSeats = 30;

    public function mount(Event $event): void
    {
        $this->event = $event;
        $this->title = $event->title;
        $this->speaker = $event->speaker;
        $this->location = $event->location;
        $this->totalSeats = $event->total_seats;
    }

    public function save(): void
    {
        $this->validate();

        $this->event->update([
            'title' => $this->title,
            'speaker' => $this->speaker,
            'location' => $this->location,
            'total_seats' => $this->totalSeats,
        ]);

        session()->flash('success', 'แก้ไขกิจกรรมเรียบร้อยแล้ว');
        $this->redirectRoute('admin.events.index');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.events.edit');
    }
}
