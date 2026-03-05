<div>
    <div class="page-header">
        <div>
            <div class="page-title">📊 Dashboard</div>
            <div class="page-sub">ภาพรวม Senior-to-Junior Workshop</div>
        </div>
    </div>

    <!-- Stats -->
    <div class="stat-cards">
        <div class="stat-card">
            <div class="stat-label">หัวข้อทั้งหมด</div>
            <div class="stat-value stat-accent">{{ $totalEvents }}</div>
            <div class="stat-sub">กิจกรรม Workshop</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">ผู้ลงทะเบียนทั้งหมด</div>
            <div class="stat-value stat-success">{{ $totalRegistrations }}</div>
            <div class="stat-sub">การลงทะเบียน</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">นักศึกษา</div>
            <div class="stat-value">{{ $totalUsers }}</div>
            <div class="stat-sub">บัญชีผู้ใช้งาน</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">หัวข้อที่เต็มแล้ว</div>
            <div class="stat-value stat-{{ $fullEvents > 0 ? 'danger' : 'success' }}">{{ $fullEvents }}</div>
            <div class="stat-sub">จาก {{ $totalEvents }} หัวข้อ</div>
        </div>
    </div>

    <!-- Events Overview Table -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">🎯 สถานะแต่ละหัวข้อ</div>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                เพิ่มกิจกรรม
            </a>
        </div>
        @if($events->isEmpty())
            <div class="empty-state">ยังไม่มีกิจกรรม</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ชื่อหัวข้อ</th>
                        <th>วิทยากร</th>
                        <th>สถานที่</th>
                        <th>ที่นั่ง</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        @php
                            $count = $event->registrations_count;
                            $pct = $event->total_seats > 0 ? min(100, ($count / $event->total_seats) * 100) : 0;
                            $barColor = $pct >= 100 ? 'fill-red' : ($pct >= 70 ? 'fill-amber' : 'fill-green');
                        @endphp
                        <tr>
                            <td style="color: var(--text); font-weight: 500;">{{ $event->title }}</td>
                            <td>{{ $event->speaker }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <div class="seat-bar-bg">
                                        <div class="seat-bar-fill {{ $barColor }}" style="width: {{ $pct }}%"></div>
                                    </div>
                                    <span
                                        style="font-size: 0.78rem; color: var(--text-muted);">{{ $count }}/{{ $event->total_seats }}</span>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>