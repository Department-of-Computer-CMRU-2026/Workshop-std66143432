<div>
    <div class="page-header">
        <div>
            <div class="page-title">👥 ผู้ลงทะเบียน</div>
            <div class="page-sub">{{ $event->title }}</div>
        </div>
        <div style="display: flex; gap: 0.75rem; align-items: center;">
            <span style="font-size: 0.82rem; color: var(--text-dim);">
                {{ $registrations->count() }}/{{ $event->total_seats }} คน
            </span>
            <a href="{{ route('admin.events.index') }}" class="btn btn-ghost">← กลับ</a>
        </div>
    </div>

    <div class="card">
        @if($registrations->isEmpty())
            <div class="empty-state">ยังไม่มีผู้ลงทะเบียนในหัวข้อนี้</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อ</th>
                        <th>อีเมล</th>
                        <th>วันที่ลงทะเบียน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrations as $registration)
                        <tr>
                            <td style="color: var(--text-dim);">{{ $loop->iteration }}</td>
                            <td style="color: var(--text); font-weight: 500;">{{ $registration->user->name }}</td>
                            <td>{{ $registration->user->email }}</td>
                            <td>{{ $registration->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>