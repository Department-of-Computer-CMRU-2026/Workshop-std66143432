<div>
    <div class="page-header">
        <div>
            <div class="page-title">✏️ แก้ไขกิจกรรม</div>
            <div class="page-sub">{{ $event->title }}</div>
        </div>
        <a href="{{ route('admin.events.index') }}" class="btn btn-ghost">← กลับ</a>
    </div>

    <div class="card" style="max-width: 680px;">
        <div class="card-body">
            <form wire:submit="save">
                <div class="form-group">
                    <label class="form-label">ชื่อหัวข้อ *</label>
                    <input wire:model="title" type="text" class="form-input">
                    @error('title') <div class="form-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">วิทยากร *</label>
                        <input wire:model="speaker" type="text" class="form-input">
                        @error('speaker') <div class="form-error">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">สถานที่ *</label>
                        <input wire:model="location" type="text" class="form-input">
                        @error('location') <div class="form-error">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group" style="max-width: 180px;">
                    <label class="form-label">จำนวนที่นั่งทั้งหมด *</label>
                    <input wire:model="totalSeats" type="number" class="form-input" min="1" max="500">
                    @error('totalSeats') <div class="form-error">{{ $message }}</div> @enderror
                </div>

                <div style="display: flex; gap: 0.75rem; margin-top: 0.5rem;">
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span wire:loading.remove>บันทึกการเปลี่ยนแปลง</span>
                        <span wire:loading>กำลังบันทึก...</span>
                    </button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-ghost">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</div>