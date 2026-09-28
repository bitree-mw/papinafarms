@extends('layouts.app')
@section('title', 'Markets & Partners | Papina Farms')
@section('content')
<x-page-intro label="Markets & Partners" title="Connecting producers. Building partnerships." description="A collaborative approach to local, national and regional agricultural markets, with wider SADC opportunities in view." image="farmer-cooperative" alt="Farmer group meeting around agricultural produce">
    <a href="#opportunities" class="site-button site-button-primary">Explore Partnerships</a>
    <a href="{{ route('website.contact') }}" class="site-button site-button-outline">Contact Us</a>
</x-page-intro>
<section class="py-space-xl bg-surface">
    <div class="site-container">
        <div class="section-heading"><h2>Markets for raw and processed produce</h2><p>We develop channels that connect organised production with the needs of buyers, processors and consumers.</p></div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
            @foreach ([['storefront', 'Retail & Wholesale', 'Retailers, wholesalers and supermarkets serving local and national customers.'], ['factory', 'Processors & Agro-dealers', 'Commercial relationships around agricultural commodities, inputs and value-added products.'], ['corporate_fare', 'Institutional Markets', 'Institutions and development programmes seeking agricultural supply and implementation support.'], ['local_shipping', 'Regional Opportunities', 'Market development beyond Malawi, including opportunities across the wider SADC region.']] as [$icon, $title, $text])
                <article class="rounded-xl p-space-lg bg-surface-container-lowest"><span aria-hidden="true" class="material-symbols-outlined text-secondary text-[28px]">{{ $icon }}</span><h3 class="font-headline-sm text-headline-sm text-primary font-bold mt-space-md">{{ $title }}</h3><p class="text-body-md text-on-surface-variant mt-space-sm">{{ $text }}</p></article>
            @endforeach
        </div>
    </div>
</section>
<section id="opportunities" class="py-space-xl bg-surface-container-low">
    <div class="site-container grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        <div class="lg:col-span-4"><h2 class="font-headline-xl text-headline-xl text-primary font-bold">Where we can work together</h2><p class="text-body-lg text-on-surface-variant mt-space-md">Technical expertise, finance, markets and implementation capacity all have a role in agricultural development.</p><img src="{{ asset('images/extension-officer-640.webp') }}" alt="Agricultural extension support" width="640" height="478" loading="lazy" class="w-full rounded-2xl mt-space-lg"></div>
        <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-space-md">
            @foreach ([
                ['Farmer Development', 'Producer organisation establishment, cooperative strengthening and agricultural commercialisation.'],
                ['Market Linkage & Off-taking', 'Structured commodity procurement and long-term supply relationships.'],
                ['Agro-processing', 'Investment, technology and technical partnerships in value-added products.'],
                ['Youth Empowerment', 'Skills training, equipment, startup financing, mentorship and enterprise development.'],
                ['Village Financial Inclusion', 'Strengthening community savings, investment and enterprise platforms.'],
                ['Agricultural Investment', 'Production, aggregation, storage, processing, livestock, horticulture, fisheries and marketing.'],
                ['Programme Implementation', 'Local mobilisation, training, market linkage and implementation support.'],
            ] as [$title, $text])
                <article class="opportunity-panel rounded-xl p-space-lg {{ $loop->last ? 'sm:col-span-2 bg-primary-container text-on-primary' : 'bg-surface-container-lowest text-primary' }}"><h3 class="font-headline-sm text-headline-sm font-bold">{{ $title }}</h3><p class="text-body-md mt-space-sm {{ $loop->last ? 'text-surface-container-high' : 'text-on-surface-variant' }}">{{ $text }}</p></article>
            @endforeach
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface">
    <div class="site-container">
        <div class="section-heading"><h2>Priority stakeholders</h2><p>Our company profile identifies the following stakeholders for collaboration. Inclusion here does not imply an existing partnership or endorsement.</p></div>
        <ul class="stakeholder-list flex flex-wrap gap-space-sm">
            @foreach (['UNDP', 'Smallholder Agricultural Cooperatives', 'Farmer Producer Organisations', 'Ministry responsible for Youth', 'TEVET Malawi', 'Technical colleges', 'Government institutions', 'Development partners', 'Private-sector buyers', 'Processors', 'Financial institutions', 'Investors'] as $stakeholder)
                <li class="bg-surface-container-lowest text-primary rounded-lg px-space-md py-space-sm font-label-lg text-label-lg">{{ $stakeholder }}</li>
            @endforeach
        </ul>
    </div>
</section>
<x-contact-strip title="Start with a shared opportunity." description="Tell us about your market needs, programme or investment interests. Our team can discuss where they align with Papina Farms’ areas of work." />
@endsection
