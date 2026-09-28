@extends('layouts.app')
@section('title', 'Papina Farms | Nourishing Every Generation')
@section('content')
<section class="home-hero relative overflow-hidden bg-primary text-on-primary">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('{{ asset('images/malawi-landscape.webp') }}')"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-primary/95 to-primary-container/70"></div>
    <div class="hero-content site-container relative pt-24 pb-20 lg:pb-28">
        <div class="max-w-4xl flex flex-col items-start gap-space-md">
            <p class="inline-flex rounded-full bg-primary-container border border-on-primary/20 text-tertiary-fixed px-3 py-1.5 font-label-sm text-label-sm uppercase tracking-wider">Papina Farms Ltd · Established 2020</p>
            <h1 class="font-display-lg text-headline-xl lg:text-display-lg font-extrabold tracking-tight leading-tight">Empowering Farmers.<br><span class="text-tertiary-fixed">Strengthening</span> Agriculture.<br>Connecting Markets.</h1>
            <p class="text-body-xl text-surface-container-high max-w-2xl">Connecting Malawian farmers with production support, markets, value addition and opportunities for sustainable enterprise.</p>
            <div class="flex flex-wrap gap-space-sm pt-space-sm"><a href="{{ route('website.services') }}" class="site-button site-button-accent">Explore Services <span aria-hidden="true" class="material-symbols-outlined text-[20px]">arrow_forward</span></a><a href="{{ route('website.membership') }}" class="site-button border border-on-primary/40 bg-on-primary/10 text-on-primary hover:bg-on-primary/20">Group Enquiries</a></div>
        </div>
    </div>
    <div class="relative bg-primary-container border-t border-on-primary/10 py-space-md">
        <div class="site-container grid grid-cols-2 md:grid-cols-4 gap-gutter">
            @foreach ([['2020', 'Established in Malawi'], ['Cooperative Roots', 'Built on farmer and community development'], ['Integrated Model', 'From mobilisation to the consumer'], ['Mzuzu', 'Our head office in Northern Malawi']] as [$value, $label])
                <div><p class="font-headline-md text-headline-md font-bold text-tertiary-fixed">{{ $value }}</p><p class="text-label-md text-surface-container-high mt-space-xs">{{ $label }}</p></div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface">
    <div class="site-container grid grid-cols-1 lg:grid-cols-2 gap-gutter items-center">
        <div><h2 class="font-headline-xl text-headline-xl text-primary font-bold">Rooted in Malawi, growing inclusive agribusiness</h2><p class="text-body-lg text-on-surface-variant mt-space-md">Papina Farms began as an agricultural cooperative initiative. Its subsequent registration as a limited company created a broader commercial and institutional platform while retaining its commitment to smallholder farmers and communities.</p><div class="p-space-md rounded-xl bg-surface-container-low border-l-4 border-secondary mt-space-lg"><h3 class="font-headline-sm text-headline-sm text-primary font-bold">Our purpose</h3><p class="text-body-lg text-on-surface-variant mt-space-xs">Enhancing food, nutrition and livelihood security through inclusive agricultural value chains and sustainable enterprise development.</p></div><a href="{{ route('website.about') }}" class="site-button site-button-outline mt-space-lg">About Us</a></div>
        <img src="{{ asset('images/farmer-cooperative.webp') }}" srcset="{{ asset('images/farmer-cooperative-640.webp') }} 640w, {{ asset('images/farmer-cooperative.webp') }} 1200w" sizes="(max-width: 767px) calc(100vw - 40px), 660px" alt="Farmer cooperative meeting in Malawi" width="1200" height="896" class="rounded-2xl w-full object-cover" loading="lazy">
    </div>
</section>
<section id="services" class="py-space-xl bg-surface-container-low">
    <div class="site-container">
        <div class="section-heading text-center mx-auto"><h2>Our core services</h2><p>Farmer development, commercial market connections and practical support for agricultural enterprise.</p></div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
            @foreach ([['groups', 'Smallholder & Cooperative Support', 'Production planning, capacity building and enterprise development.', 'farmer-support'], ['hub', 'Farmer Producer Organisations', 'Organised production, quality management and access to formal markets.', 'producer-organisations'], ['warehouse', 'Off-taking & Aggregation', 'Coordinating producer groups and connecting commodities with buyers.', 'aggregation'], ['factory', 'Value Addition & Agro-processing', 'Developing market-ready products from agricultural produce.', 'processing'], ['storefront', 'Agricultural Marketing', 'Retail, wholesale, institutional, processor and regional market channels.', 'marketing'], ['school', 'Youth Empowerment', 'Skills, entrepreneurship, productive equipment and enterprise opportunities.', 'youth'], ['account_balance', 'Village Bank Enhancement', 'Financial literacy, savings, governance and productive investment.', 'village-banks'], ['handshake', 'Agribusiness Consultancy', 'Enterprise planning, market assessment and value-chain development.', 'consultancy']] as [$icon, $title, $text, $anchor])
                <article class="bg-surface-container-lowest rounded-xl p-space-lg flex flex-col"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[28px] mb-space-md">{{ $icon }}</span><h3 class="font-headline-sm text-headline-sm text-primary font-bold">{{ $title }}</h3><p class="text-body-md text-on-surface-variant mt-space-sm">{{ $text }}</p><a href="{{ route('website.services') }}#{{ $anchor }}" class="text-label-md text-secondary font-semibold mt-auto pt-space-md hover:underline">Explore service <span class="sr-only">{{ $title }}</span></a></article>
            @endforeach
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface">
    <div class="site-container"><div class="section-heading"><h2>The Papina farm-to-consumer value chain</h2><p>A connected model that creates opportunities for value retention, employment and local economic participation.</p></div><ol class="value-chain-grid">@foreach (['Farmer Mobilisation', 'Producer Organisation', 'Production Support', 'Aggregation', 'Off-taking', 'Processing / Value Addition', 'Packaging', 'Marketing', 'Consumer'] as $stage)<li class="p-space-md bg-surface-container-low rounded-lg text-primary font-label-lg text-label-lg">{{ $stage }}</li>@endforeach</ol></div>
</section>
<section id="farmers-membership" class="py-space-xl bg-surface-container">
    <div class="site-container"><div class="bg-surface-container-lowest rounded-2xl p-space-lg lg:p-space-xl border-l-4 border-primary grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center"><div class="lg:col-span-8"><h2 class="font-headline-lg text-headline-lg text-primary font-bold">Grow as an organised farmer group</h2><p class="text-body-lg text-on-surface-variant mt-space-md">Explore how cooperatives, Farmer Producer Organisations, women and youth groups can connect with Papina Farms’ agricultural and enterprise programmes.</p></div><div class="lg:col-span-4"><a href="{{ route('website.membership') }}" class="site-button site-button-primary">Group Enquiries</a><p class="text-body-sm text-on-surface-variant mt-space-md">Contact our team for current membership arrangements and registration guidance.</p></div></div></div>
</section>
<section id="partnerships" class="py-space-xl bg-surface">
    <div class="site-container grid grid-cols-1 md:grid-cols-2 gap-gutter items-center"><div><h2 class="font-headline-lg text-headline-lg text-primary font-bold">Our markets & partnership opportunities</h2><p class="text-body-lg text-on-surface-variant mt-space-md">Connecting farmers and community enterprises with buyers, processors, institutions, investors and development programmes.</p><a href="{{ route('website.markets') }}" class="site-button site-button-outline mt-space-lg">Explore Partnerships</a></div><div class="grid grid-cols-2 gap-space-sm">@foreach (['Local & National Markets', 'Wider SADC Opportunities', 'Public & Development Sectors', 'Private-sector Enterprise'] as $market)<p class="p-space-lg rounded-xl bg-surface-container-low text-primary font-label-lg text-label-lg">{{ $market }}</p>@endforeach</div></div>
</section>
<section id="resources" class="py-space-xl bg-surface-container-low">
    <div class="site-container grid grid-cols-1 md:grid-cols-2 gap-gutter items-center"><div><h2 class="font-headline-lg text-headline-lg text-primary font-bold">Resources for your next conversation</h2><p class="text-body-lg text-on-surface-variant mt-space-md">Read the stakeholder company profile for our background, core activities, commodities, partnership priorities and growth direction.</p></div><div class="flex flex-wrap gap-space-sm md:justify-end"><a href="{{ route('website.resources') }}" class="site-button site-button-outline">View Resources</a></div></div>
</section>
<div id="contact"><x-contact-strip title="Ready to advance agricultural value in Malawi?" /></div>
@endsection
