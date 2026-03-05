<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="lg-auth-bg" style="font-family:'Noto Sans Thai','Instrument Sans',ui-sans-serif,system-ui,sans-serif;">

    {{-- Aurora background --}}
    <div class="lg-bg-aurora"></div>
    <div class="lg-orb-3"></div>

    <div
        style="display:flex; flex-direction:column; align-items:center; gap:1.5rem; width:100%; position:relative; z-index:1; padding: 2rem 1rem;">

        {{-- Logo / Brand --}}
        <a href="{{ route('home') }}" class="brand-logo" style="margin-bottom: 0.5rem;" wire:navigate>
            <div class="brand-icon-glass" style="width: 44px; height: 44px; font-size: 1.1rem; border-radius: 12px;">
                S<span>/</span>J</div>
            <div class="brand-text-minimal">
                <span class="title" style="font-size: 1.1rem;">Senior to Junior</span>
                <span class="subtitle" style="font-size: 0.7rem;">Workshop 2026</span>
            </div>
        </a>

        {{-- Glass card --}}
        <div class="lg-auth-card" style="max-width:480px;">
            {{ $slot }}
        </div>

    </div>

    @fluxScripts
</body>

</html>