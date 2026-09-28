@extends('layouts.app')
@section('title', 'Farmers & Membership | Papina Farms')
@section('content')
<x-page-intro label="Farmers & Membership" title="Stronger together, from farm to market." description="Connecting farmer groups, cooperatives and producer organisations with agricultural enterprise and market opportunities." image="farmer-cooperative" alt="Farmer group meeting around produce">
    <a href="#registration" class="site-button site-button-primary">Group Enquiries</a>
    <a href="{{ route('website.contact') }}" class="site-button site-button-outline">Contact Us</a>
</x-page-intro>
<section class="py-space-xl bg-surface">
    <div class="site-container">
        <div class="section-heading"><h2>Who Can Apply for Membership?</h2><p>Our profile identifies the groups we work with and seek to serve. Contact our team to discuss current membership and collaboration arrangements.</p></div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
            @foreach ([['groups', 'Farmer Groups', 'Smallholder farmers organising production and exploring commercial agricultural opportunities.'], ['hub', 'Cooperatives & FPOs', 'Agricultural cooperatives and Farmer Producer Organisations strengthening aggregation and access to formal markets.'], ['diversity_3', 'Women & Youth Groups', 'Groups exploring skills, entrepreneurship, productive enterprise and agricultural value chains.'], ['account_balance', 'Community Enterprises', 'Community enterprises and village savings and loan groups connecting savings with investment and enterprise.']] as [$icon, $title, $text])
                <article class="bg-surface-container-lowest p-space-lg rounded-xl"><span aria-hidden="true" class="material-symbols-outlined text-secondary text-[28px]">{{ $icon }}</span><h3 class="font-headline-sm text-headline-sm text-primary font-bold mt-space-md">{{ $title }}</h3><p class="text-body-md text-on-surface-variant mt-space-sm">{{ $text }}</p></article>
            @endforeach
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface-container-low">
    <div class="site-container grid grid-cols-1 lg:grid-cols-2 gap-gutter items-center">
        <img src="{{ asset('images/extension-officer.webp') }}" srcset="{{ asset('images/extension-officer-640.webp') }} 640w, {{ asset('images/extension-officer.webp') }} 1200w" sizes="(max-width: 767px) calc(100vw - 40px), 660px" alt="Agricultural extension officer" width="1200" height="896" loading="lazy" class="rounded-2xl w-full">
        <div><h2 class="font-headline-lg text-headline-lg text-primary font-bold">Support for organised agricultural enterprise</h2><p class="text-body-lg text-on-surface-variant mt-space-md">Papina Farms supports production planning, capacity building, enterprise development, quality management, aggregation and market linkage.</p><p class="text-body-lg text-on-surface-variant mt-space-md">Youth programmes and village bank enhancement connect skills, financial literacy, governance and investment planning with practical enterprise opportunities.</p><a href="{{ route('website.services') }}" class="site-button site-button-primary mt-space-lg">Explore Services</a></div>
    </div>
</section>
<section id="registration" class="py-space-xl bg-surface">
    <div class="site-container grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        <div class="lg:col-span-7"><h2 class="font-headline-lg text-headline-lg text-primary font-bold">Start a group enquiry</h2><p class="text-body-lg text-on-surface-variant mt-space-md">Tell us about your group and the opportunity you would like to explore. Our team can explain the current arrangements and any information needed for the next step.</p><div class="flex flex-wrap gap-space-sm mt-space-lg"><a href="mailto:{{ config('company.email') }}?subject=Farmer%20group%20enquiry" class="site-button site-button-primary">Email Our Team</a><button type="button" data-checklist class="site-button site-button-outline">View Enquiry Checklist</button></div></div>
        <aside class="lg:col-span-5 bg-surface-container-low rounded-xl p-space-lg"><span aria-hidden="true" class="material-symbols-outlined text-primary text-[32px]">description</span><h3 class="font-headline-sm text-headline-sm text-primary font-bold mt-space-md">Registration documents</h3><p class="text-body-md text-on-surface-variant mt-space-sm">Official registration form coming soon.</p><p class="text-body-md text-on-surface-variant mt-space-sm">Please contact our team for current guidance. An enquiry does not confirm membership, financing or a purchase agreement.</p></aside>
    </div>
</section>
<section id="checklist-section" class="py-space-xl bg-surface-container-low">
    <div class="site-container">
        <div class="section-heading"><h2>Helpful information for your first enquiry</h2><p>This is a conversation guide, not an application requirement or a request to send identity documents.</p></div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
            @foreach ([['Your group', 'Your group or organisation name, location and a contact person.'], ['Your activities', 'The crops, enterprises or agricultural activities your group is involved in.'], ['Your priorities', 'The production, skills, enterprise or market-access needs you would like to discuss.'], ['Your opportunity', 'Any proposed collaboration, buyer interest or programme you would like to explore.']] as [$title, $text])
                <div class="bg-surface-container-lowest p-space-lg rounded-xl"><h3 class="font-headline-sm text-headline-sm text-primary font-bold">{{ $title }}</h3><p class="text-body-md text-on-surface-variant mt-space-sm">{{ $text }}</p></div>
            @endforeach
        </div>
    </div>
</section>
<x-contact-strip title="Speak with the Papina Farms team." description="Contact our head office in Mzuzu to discuss farmer group support and current collaboration opportunities." />
@endsection
