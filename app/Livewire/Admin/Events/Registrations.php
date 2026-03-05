<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin')]
#[Title('ผู้ลงทะเบียน — Admin')]
class Registrations extends Component
{
    public Event $event;

    /** @var \Illuminate\Database\Eloquent\Collection<int, \App\Models\Registration> */
    public $registrations;

    public function mount(Event $event): void
    {
        $this->event = $event;
        $this->registrations = $event->registrations()->with('user')->latest()->get();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.events.registrations');
    }
}
