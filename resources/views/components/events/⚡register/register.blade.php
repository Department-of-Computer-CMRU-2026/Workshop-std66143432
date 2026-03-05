<?php

use App\Models\Event;
use Livewire\Component;

new class extends Component {
    public int $eventId;
    public string $message = '';
    public string $messageType = '';

    public function mount(Event $event): void
    {
        $this->eventId = $event->id;
    }

    public function register(): void
    {
        if (!auth()->check()) {
            $this->redirectRoute('login');

            return;
        }

        $event = Event::findOrFail($this->eventId);

        if ($event->isFull()) {
            $this->message = 'ขออภัย หัวข้อนี้มีผู้ลงทะเบียนครบแล้ว';
            $this->messageType = 'error';

            return;
        }

        $alreadyRegistered = auth()->user()->registrations()->where('event_id', $this->eventId)->exists();

        if ($alreadyRegistered) {
            $this->message = 'คุณได้ลงทะเบียนหัวข้อนี้ไปแล้ว';
            $this->messageType = 'error';

            return;
        }

        auth()->user()->registrations()->create(['event_id' => $this->eventId]);

        $this->message = 'ลงทะเบียนสำเร็จ!';
        $this->messageType = 'success';
    }
};
?>

<div>
    @if ($message)
        <div style="padding: 0.5rem; background: {{ $messageType === 'success' ? 'green' : 'red' }}; color: white;">
            {{ $message }}
        </div>
    @endif
    <button wire:click="register">ลงทะเบียน</button>
</div>