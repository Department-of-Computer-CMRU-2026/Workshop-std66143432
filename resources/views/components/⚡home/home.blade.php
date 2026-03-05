<div>
    <nav class="nav">
        <div class="nav-brand">Senior<span>→</span>Junior<span> WS</span></div>
        <div class="nav-links">
            @auth
                <div class="nav-user">
                    <div class="avatar">{{ auth()->user()->initials() }}</div>
                    <span class="nav-user-name">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-nav btn-nav-outline">ออกจากระบบ</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-nav btn-nav-ghost">เข้าสู่ระบบ</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-nav btn-nav-primary">สมัครสมาชิก</a>
                @endif
            @endauth
        </div>
    </nav>

    <section class="hero">
        <div class="hero-badge">⚡ งานวิชาการ 2026</div>
        <h1>Senior-to-Junior<br>Workshop</h1>
        <p class="hero-sub">รุ่นพี่ถ่ายทอดประสบการณ์และความรู้สู่รุ่นน้อง เลือกหัวข้อที่คุณสนใจ
            จำกัดจำนวนที่นั่งเพื่อคุณภาพในการเรียนรู้</p>
        <div class="hero-meta">
            <div class="hero-meta-item">
                <div class="hero-meta-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" style="color: var(--primary-light)">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                มีนาคม 2026
            </div>
            <div class="hero-meta-item">
                <div class="hero-meta-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" style="color: var(--accent)">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                มหาวิทยาลัยราชภัฏเชียงใหม่
            </div>
            <div class="hero-meta-item">
                <div class="hero-meta-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" style="color: var(--success)">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                {{ $events->count() }} หัวข้อ Workshop
            </div>
        </div>
    </section>

    @if (session('success'))
        <div class="flash-container">
            <div class="flash flash-success">✅ {{ session('success') }}</div>
        </div>
    @endif
    @if (session('error'))
        <div class="flash-container">
            <div class="flash flash-error">⚠️ {{ session('error') }}</div>
        </div>
    @endif

    <section class="events-section">
        <div class="section-title">🎯 เลือกหัวข้อที่คุณสนใจ</div>
        <p class="section-sub">แต่ละหัวข้อมีจำนวนที่นั่งจำกัด ลงทะเบียนก่อนที่นั่งเต็ม!</p>

        @if($events->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">📭</div>
                <p>ยังไม่มีกิจกรรมในขณะนี้</p>
            </div>
        @else
            <div class="events-grid">
                @php $avatarClasses = ['av-1', 'av-2', 'av-3', 'av-4', 'av-5', 'av-6']; @endphp
                @foreach($events as $event)
                    @php
                        $registeredCount = $event->registrations_count;
                        $available = max(0, $event->total_seats - $registeredCount);
                        $isFull = $available <= 0;
                        $fillPct = $event->total_seats > 0 ? min(100, ($registeredCount / $event->total_seats) * 100) : 0;
                        $isRegistered = auth()->check() && auth()->user()->registrations()->where('event_id', $event->id)->exists();
                        $barColor = $fillPct >= 90 ? 'red' : ($fillPct >= 60 ? 'amber' : 'green');
                        $avatarClass = $avatarClasses[$loop->index % count($avatarClasses)];
                        $words = preg_split('/\s+/', trim($event->speaker));
                        $initials = implode('', array_map(fn($w) => mb_substr($w, 0, 1), array_slice($words, 0, 2)));
                    @endphp
                    <div class="event-card" wire:key="event-{{ $event->id }}">
                        <div class="event-card-header">
                            <div class="event-title">{{ $event->title }}</div>
                            @if($isRegistered)
                                <span class="badge badge-registered">✓ ลงทะเบียนแล้ว</span>
                            @elseif($isFull)
                                <span class="badge badge-full">● เต็มแล้ว</span>
                            @elseif($available <= 5)
                                <span class="badge badge-warning">🔥 ใกล้เต็ม</span>
                            @else
                                <span class="badge badge-available">● ว่าง</span>
                            @endif
                        </div>

                        <div class="event-meta">
                            <div class="event-meta-row">
                                <svg class="event-meta-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $event->location }}
                            </div>
                        </div>

                        <div class="seat-info">
                            <div class="seat-bar-bg">
                                <div class="seat-bar-fill {{ $barColor }}" style="width: {{ $fillPct }}%"></div>
                            </div>
                            <div class="seat-text">
                                <span>ที่นั่งที่เหลือ: <strong>{{ $available }}/{{ $event->total_seats }}</strong></span>
                                <span>{{ round($fillPct) }}% เต็ม</span>
                            </div>
                        </div>

                        <div class="speaker-block">
                            <div class="speaker-avatar {{ $avatarClass }}">{{ $initials }}</div>
                            <div>
                                <div class="speaker-name">{{ $event->speaker }}</div>
                                <div class="speaker-role">วิทยากร</div>
                            </div>
                        </div>

                        @if($isRegistered)
                            <button class="btn-register btn-register-done" disabled>
                                ✅ ลงทะเบียนเรียบร้อยแล้ว
                            </button>
                        @elseif($isFull)
                            <button class="btn-register btn-register-full" disabled>
                                ❌ ขออภัย ที่นั่งเต็มแล้ว
                            </button>
                        @else
                            <button class="btn-register btn-register-primary" wire:click="register({{ $event->id }})"
                                wire:loading.attr="disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                ลงทะเบียน
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <footer class="footer">
        &copy; 2026 Senior-to-Junior Workshop · มหาวิทยาลัยราชภัฏเชียงใหม่
    </footer>
</div>