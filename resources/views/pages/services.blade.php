@extends('layouts.app')
@section('title', 'What We Do | Papina Farms')
@section('content')
<x-page-intro label="What We Do" title="From farmer organisation to market." description="We connect production, enterprise development and market access to help agricultural value stay within Malawi’s economy." image="grain-warehouse" alt="Agricultural produce storage and processing facility">
    <a href="#our-services" class="site-button site-button-primary">Explore Services <span aria-hidden="true" class="material-symbols-outlined text-[20px]">arrow_forward</span></a>
    <a href="{{ route('website.contact') }}" class="site-button site-button-outline">Contact Us</a>
</x-page-intro>
<section id="our-services" class="py-space-xl bg-surface">
    <div class="site-container">
        <div class="section-heading"><h2>Practical support across the value chain</h2><p>Our core areas bring farmer development, commercial activity and community enterprise together.</p></div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
            @foreach ([
                ['farmer-support', 'groups', 'Smallholder Farmer & Cooperative Support', 'Establishing and strengthening farmer groups, cooperatives and Farmer Producer Organisations through production planning, capacity building, enterprise development and market linkage.'],
                ['producer-organisations', 'hub', 'Farmer Producer Organisations', 'Supporting organised production, aggregation, quality management and bargaining capacity so producers can access formal markets.'],
                ['aggregation', 'warehouse', 'Agricultural Off-taking & Aggregation', 'Coordinating producer groups, aggregating commodities and supporting quality and quantity management to connect farmers with buyers and processors.'],
                ['processing', 'factory', 'Value Addition & Agro-processing', 'Developing cooking oil, soybean and groundnut products, nutritional foods, livestock feeds, tomato products and other commercially viable agricultural products.'],
                ['marketing', 'storefront', 'Agricultural Marketing', 'Developing retail, wholesale, supermarket, institutional, processor and regional market channels for raw and processed agricultural products.'],
                ['youth', 'school', 'Youth Empowerment Programme', 'Linking young people to vocational and agricultural skills, entrepreneurship, productive equipment, startup support and enterprise opportunities.'],
                ['village-banks', 'account_balance', 'Village Bank Enhancement Programme', 'Strengthening village savings and loan groups through financial literacy, governance, savings mobilisation, investment planning, enterprise development and market linkage.'],
                ['consultancy', 'handshake', 'Agribusiness Consultancy & Enterprise Support', 'Enterprise planning, market assessment, value-chain and cooperative development, agricultural investment planning and capacity building.'],
            ] as [$id, $icon, $title, $description])
                <article id="{{ $id }}" class="service-panel bg-surface-container-lowest rounded-xl p-space-lg">
                    <span aria-hidden="true" class="material-symbols-outlined text-primary text-[28px] mb-space-md">{{ $icon }}</span>
                    <h3 class="font-headline-md text-headline-md text-primary font-bold">{{ $title }}</h3>
                    <p class="text-body-lg text-on-surface-variant mt-space-sm">{{ $description }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface-container-low">
    <div class="site-container">
        <div class="section-heading"><h2>One connected route to the consumer</h2><p>Our integrated model links agricultural producers with markets, creating opportunities for employment, enterprise and local economic participation.</p></div>
        <ol class="value-chain-grid">
            @foreach (['Farmer Mobilisation', 'Producer Organisation', 'Production Support', 'Aggregation', 'Off-taking', 'Processing / Value Addition', 'Packaging', 'Marketing', 'Consumer'] as $stage)
                <li class="rounded-lg bg-surface-container-lowest p-space-md flex items-center justify-between gap-space-sm"><span class="font-label-lg text-label-lg text-primary">{{ $stage }}</span><span aria-hidden="true" class="material-symbols-outlined text-secondary text-[20px]">{{ $loop->last ? 'check' : 'arrow_forward' }}</span></li>
            @endforeach
        </ol>
    </div>
</section>
<section class="py-space-xl bg-surface">
    <div class="site-container grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
        <div class="lg:col-span-5"><img src="{{ asset('images/malawi-landscape.webp') }}" alt="Agricultural landscape in Malawi" width="1200" height="670" loading="lazy" class="rounded-2xl w-full object-cover"><h2 class="font-headline-lg text-headline-lg text-primary font-bold mt-space-lg">Commodities & enterprises</h2><p class="text-body-lg text-on-surface-variant mt-space-sm">A broad agricultural base, with opportunities in production, processing and sustainable enterprise.</p></div>
        <dl class="lg:col-span-7 enterprise-list">
            @foreach ([
                ['Crops', 'Soybeans, groundnuts, maize, rice, beans and legumes, sunflower, horticultural crops, tomatoes, bananas, cassava and other commercially viable crops.'],
                ['Livestock', 'Poultry and livestock feed enterprises.'],
                ['Fisheries', 'Aquaculture and fisheries initiatives.'],
                ['Agro-processing', 'Cooking oil, nutritional products, animal feeds, tomato products and other value-added agricultural products.'],
                ['Forestry', 'Sustainable pine and blue-gum plantation and woodlot development.'],
            ] as [$title, $description])
                <div><dt class="font-headline-sm text-headline-sm font-bold text-primary">{{ $title }}</dt><dd class="text-body-lg text-on-surface-variant mt-space-xs">{{ $description }}</dd></div>
            @endforeach
        </dl>
    </div>
</section>
<x-contact-strip title="Find the right support for your enterprise." />
@endsection
