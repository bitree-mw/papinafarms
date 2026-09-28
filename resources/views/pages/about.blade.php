@extends('layouts.app')
@section('title', 'About Us | Papina Farms')
@section('content')
<x-page-intro label="About Papina Farms" title="Nourishing Every Generation Through Sustainable Agribusiness." description="A Malawian agribusiness connecting smallholder farmers, organised producer groups, markets, value addition and investment.">
</x-page-intro>
<section class="py-space-xl bg-surface">
    <div class="site-container grid grid-cols-1 lg:grid-cols-2 gap-gutter items-center">
        <img src="{{ asset('images/farmer-cooperative.webp') }}" srcset="{{ asset('images/farmer-cooperative-640.webp') }} 640w, {{ asset('images/farmer-cooperative.webp') }} 1200w" sizes="(max-width: 767px) calc(100vw - 40px), 660px" alt="Farmer cooperative meeting in Malawi" width="1200" height="896" class="rounded-2xl w-full" loading="lazy">
        <div>
            <h2 class="font-headline-xl text-headline-xl text-primary font-bold">Cooperative roots. A wider commercial purpose.</h2>
            <p class="text-body-lg text-on-surface-variant mt-space-md">Established in 2020, Papina Farms began as an agricultural cooperative initiative working with farmers and communities to promote production, food security and livelihood opportunities.</p>
            <p class="text-body-lg text-on-surface-variant mt-space-md">As its activities and partnerships expanded, the organisation was subsequently registered as Papina Farms Ltd. This broadened its capacity to work with development partners, government institutions, buyers, investors and other stakeholders.</p>
            <p class="text-body-lg text-on-surface-variant mt-space-md">Today, the company combines a commercial platform with a continuing commitment to smallholder farmers, cooperatives and community development.</p>
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface-container-low">
    <div class="site-container">
        <div class="section-heading"><h2>Our vision & mission</h2><p>Enhancing food, nutrition and livelihood security through inclusive agricultural enterprise.</p></div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
            <article class="p-space-lg lg:p-space-xl bg-primary-container text-on-primary rounded-2xl"><span aria-hidden="true" class="material-symbols-outlined text-primary-fixed text-[32px]">visibility</span><h3 class="font-headline-md text-headline-md font-bold mt-space-md">Our Vision</h3><p class="text-body-xl text-surface-container-high mt-space-md">To become a leading Malawian agribusiness partner connecting smallholder farmers to sustainable markets, value addition, investment and livelihood opportunities.</p></article>
            <article class="p-space-lg lg:p-space-xl bg-surface-container-lowest text-primary rounded-2xl"><span aria-hidden="true" class="material-symbols-outlined text-secondary text-[32px]">flag</span><h3 class="font-headline-md text-headline-md font-bold mt-space-md">Our Mission</h3><p class="text-body-xl text-on-surface-variant mt-space-md">To enhance food, nutrition and livelihood security through inclusive agricultural value chains, smallholder farmer development, market access, value addition, youth empowerment and sustainable enterprise development.</p></article>
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface">
    <div class="site-container">
        <div class="section-heading"><h2>What we work towards</h2><p>Our strategic objectives connect commercial agriculture with practical economic opportunities for communities.</p></div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
            @foreach ([['Stronger farmer organisations', 'Strengthen smallholder farmer organisations and their participation in commercial agriculture.'], ['Better market access', 'Improve access through aggregation, off-taking and market-linkage services.'], ['Local value addition', 'Promote local agro-processing and build sustainable enterprises for local, national and regional markets.'], ['Youth enterprise', 'Create practical economic opportunities through skills and enterprise development.'], ['Village financial structures', 'Strengthen community platforms for savings, investment and productive enterprise.'], ['Effective partnerships', 'Mobilise technical expertise, finance, markets, technology and implementation capacity.']] as [$title, $text])
                <article class="bg-surface-container-lowest rounded-xl p-space-lg"><h3 class="font-headline-sm text-headline-sm text-primary font-bold">{{ $title }}</h3><p class="text-body-md text-on-surface-variant mt-space-sm">{{ $text }}</p></article>
            @endforeach
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface-container-low">
    <div class="site-container grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">
        <div class="lg:col-span-7"><h2 class="font-headline-lg text-headline-lg text-primary font-bold">Growth with local participation</h2><p class="text-body-lg text-on-surface-variant mt-space-md">Papina Farms aims to contribute to increased farmer incomes, stronger producer organisations, youth employment, women’s and community economic participation, improved market access and reduced post-harvest losses.</p><p class="text-body-lg text-on-surface-variant mt-space-md">Our growth priorities include expanding farmer networks, strengthening aggregation and off-taking, increasing processing capacity, developing market-ready products, scaling youth and village enterprise programmes and mobilising strategic investment.</p><a href="{{ route('website.markets') }}" class="site-button site-button-primary mt-space-lg">Explore Partnerships</a></div>
        <img src="{{ asset('images/malawi-landscape.webp') }}" alt="Cultivated landscape in Malawi" width="1200" height="670" loading="lazy" class="lg:col-span-5 rounded-2xl w-full">
    </div>
</section>
<x-contact-strip title="Building stronger farmers. Creating value. Connecting markets." />
@endsection
