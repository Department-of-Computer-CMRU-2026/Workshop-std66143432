<div>
    <div class="page-header">
        <div>
            <div class="page-title">📅 จัดการกิจกรรม</div>
            <div class="page-sub">เพิ่ม แก้ไข หรือลบหัวข้อ Workshop</div>
        </div>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            เพิ่มกิจกรรมใหม่
        </a>
    </div>

    @if (session('success'))
        <div class="flash flash-success" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            x-transition.duration.500ms>✅ {{ session('success') }}</div>
    @endif

    <div class="card">
        @if($events->isEmpty())
            <div class="empty-state">
                <p>ยังไม่มีกิจกรรม</p>
                <a href="{{ route('admin.events.create') }}" class="btn btn-primary"
                    style="margin-top: 1rem;">เพิ่มกิจกรรมแรก</a>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อหัวข้อ</th>
                        <th>วิทยากร</th>
                        <th>สถานที่</th>
                        <th>ที่นั่ง</th>
                        <th>สถานะ</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        @php
                            $count = $event->registrations_count;
                            $pct = $event->total_seats > 0 ? min(100, ($count / $event->total_seats) * 100) : 0;
                        @endphp
                        <tr>
                            <td style="color: var(--text-dim);">{{ $loop->iteration }}</td>
                            <td style="color: var(--text); font-weight: 500; max-width: 240px;">{{ $event->title }}</td>
                            <td>{{ $event->speaker }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <div class="seat-bar-bg">
                                        <div class="seat-bar-fill {{ $pct >= 100 ? 'fill-red' : ($pct >= 70 ? 'fill-amber' : 'fill-green') }}"
                                            style="width: {{ $pct }}%"></div>
                                    </div>
                                    <span
                                        style="font-size: 0.78rem; white-space: nowrap;">{{ $count }}/{{ $event->total_seats }}</span>
                                </div>
                            </td>
                            <td>
                                @if($pct >= 100)
                                    <span class="badge badge-full">เต็ม</span>
                                @elseif($pct >= 70)
                                    <span class="badge badge-warning">ใกล้เต็ม</span>
                                @else
                                    <span class="badge badge-open">ว่าง</span>
                                @endif
                            </td>
                            <td>
                                <div style="display: flex; gap: 0.4rem; flex-wrap: nowrap;">
                                    <a href="{{ route('admin.events.registrations', $event) }}" class="btn btn-ghost btn-sm"
                                        title="ดูผู้ลงทะเบียน">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $count }}
                                    </a>
                                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-ghost btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        แก้ไข
                                    </a>
                                    <button wire:click="confirmDelete({{ $event->id }})" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        ลบ
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
        <div class="modal-overlay" wire:click.self="cancelDelete">
            <div class="modal">
                <div class="modal-title">⚠️ ยืนยันการลบ</div>
                <div class="modal-body">คุณแน่ใจหรือไม่ว่าต้องการลบกิจกรรมนี้? การดำเนินการนี้ไม่สามารถย้อนกลับได้
                    และจะลบข้อมูลผู้ลงทะเบียนทั้งหมดในกิจกรรมนี้ด้วย</div>
                <div class="modal-actions">
                    <button wire:click="cancelDelete" class="btn btn-ghost">ยกเลิก</button>
                    <button wire:click="deleteEvent" class="btn btn-danger">ยืนยันการลบ</button>
                </div>
            </div>
        </div>
    @endif
</div>