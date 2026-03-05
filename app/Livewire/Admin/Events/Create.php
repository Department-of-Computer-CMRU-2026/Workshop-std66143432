<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.admin')]
#[Title('เพิ่ม Event — Admin')]
class Create extends Component
{
    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|string|max:255')]
    public string $speaker = '';

    #[Validate('required|string|max:255')]
    public string $location = '';

    #[Validate('required|integer|min:1|max:500')]
    public int $totalSeats = 30;

    public function save(): void
    {
        $this->validate();

        Event::create([
            'title' => $this->title,
            'speaker' => $this->speaker,
            'location' => $this->location,
            'total_seats' => $this->totalSeats,
        ]);

        session()->flash('success', 'เพิ่มกิจกรรมเรียบร้อยแล้ว');
        $this->redirectRoute('admin.events.index');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.events.create');
    }
}
