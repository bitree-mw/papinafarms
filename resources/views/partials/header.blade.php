@php
    $navigation = [
        ['Home', route('website.home'), 'website.home'],
        ['About Us', route('website.about'), 'website.about'],
        ['What We Do', route('website.services'), 'website.services'],
        ['Farmers & Membership', route('website.membership'), 'website.membership'],
        ['Markets & Partners', route('website.markets'), 'website.markets'],
        ['Resources', route('website.resources'), 'website.resources'],
        ['Contact Us', route('website.contact'), 'website.contact'],
    ];
@endphp
<header class="site-header fixed top-0 left-0 w-full bg-surface-container-lowest/95 backdrop-blur-xl shadow-sm">
    <div class="header-inner h-20 max-w-[1440px] mx-auto px-margin-mobile lg:px-margin flex items-center justify-between gap-space-md">
        <a href="{{ route('website.home') }}" class="brand flex items-center gap-space-sm">
            <img src="{{ asset('images/papina-icon-large.webp') }}" alt="" class="h-10 w-10 object-contain" width="40" height="40">
            <span class="flex flex-col">
                <span class="brand-name font-headline-sm text-primary font-bold tracking-tight">PAPINA FARMS LTD</span>
                <span class="brand-tagline text-on-surface-variant uppercase tracking-wider">Nourishing Every Generation</span>
            </span>
        </a>
        <nav class="desktop-navigation items-center gap-space-md" aria-label="Main navigation">
            @foreach ($navigation as [$label, $url, $routeName])
                <a href="{{ $url }}" @if ($routeName && request()->routeIs($routeName)) aria-current="page" @endif class="nav-link font-label-md text-label-md text-on-surface-variant hover:text-primary">{{ $label }}</a>
            @endforeach
        </nav>
        <div class="flex items-center gap-space-sm">
            <a href="{{ route('website.membership') }}#registration" class="header-membership inline-flex items-center justify-center bg-tertiary-fixed text-on-tertiary-fixed font-label-md text-label-md px-space-md py-space-sm rounded-lg hover:bg-tertiary-fixed-dim">Become a Group Member</a>
            <button type="button" class="menu-toggle bg-primary text-on-primary rounded-lg p-2" aria-expanded="false" aria-controls="mobile-navigation" aria-label="Open navigation">
                <span class="material-symbols-outlined" aria-hidden="true">menu</span>
            </button>
        </div>
    </div>
    <nav id="mobile-navigation" class="mobile-navigation px-margin-mobile pb-space-md" aria-label="Mobile navigation" hidden>
        @foreach ($navigation as [$label, $url, $routeName])
            <a href="{{ $url }}" @if ($routeName && request()->routeIs($routeName)) aria-current="page" @endif class="nav-link block py-3 px-space-sm rounded-lg font-label-lg text-label-lg text-primary">{{ $label }}</a>
        @endforeach
        <a href="{{ route('website.membership') }}#registration" class="mobile-membership block bg-tertiary-fixed text-on-tertiary-fixed px-space-sm py-3 rounded-lg font-semibold">Become a Group Member</a>
    </nav>
</header>
