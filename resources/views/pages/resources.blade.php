@extends('layouts.app')
@section('title', 'Resources | Papina Farms')
@section('content')
<x-page-intro label="Resources" title="Company information, ready to share." description="Explore our company profile, areas of operation and opportunities for farmers, enterprises and partners.">
    <x-profile-link />
</x-page-intro>
<section class="py-space-xl bg-surface">
    <div class="site-container">
        <article class="profile-feature grid grid-cols-1 lg:grid-cols-12 gap-gutter bg-surface-container-lowest rounded-2xl overflow-hidden">
            <div class="lg:col-span-4 bg-primary-container text-on-primary p-space-xl flex flex-col justify-between gap-space-xl">
                <span aria-hidden="true" class="material-symbols-outlined text-tertiary-fixed text-[48px]">description</span>
                <div><p class="font-label-md text-label-md text-primary-fixed">PAPINA FARMS LTD</p><h2 class="font-headline-lg text-headline-lg font-bold mt-space-sm">Stakeholder & Partnership Company Profile</h2><p class="text-body-lg text-surface-container-high mt-space-md">Enhancing Food, Nutrition and Livelihood Security</p></div>
                <p class="text-label-md text-surface-container-high">PDF document · 3 pages</p>
            </div>
            <div class="lg:col-span-8 p-space-lg lg:p-space-xl">
                <h3 class="font-headline-md text-headline-md text-primary font-bold">Get to know Papina Farms</h3>
                <p class="text-body-lg text-on-surface-variant mt-space-md">Our stakeholder profile brings together the company’s background, purpose, programmes and commercial direction in one document.</p>
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-space-md my-space-lg text-body-lg text-on-surface-variant">
                    @foreach (['Cooperative roots and company background', 'Vision, mission and strategic objectives', 'Core operations and value-chain model', 'Commodities, enterprises and markets', 'Partnership and investment opportunities', 'Sustainability and growth direction'] as $topic)
                        <li class="flex items-start gap-space-sm"><span aria-hidden="true" class="material-symbols-outlined text-secondary text-[20px]">check</span><span>{{ $topic }}</span></li>
                    @endforeach
                </ul>
                <div class="flex flex-wrap gap-space-sm"><x-profile-link /><a href="{{ asset(config('company.profile')) }}" target="_blank" rel="noopener" class="site-button site-button-outline">Read PDF <span class="sr-only">(opens in a new tab)</span></a></div>
            </div>
        </article>
    </div>
</section>
<section class="py-space-xl bg-surface-container-low">
    <div class="site-container">
        <div class="section-heading"><h2>Find the information you need</h2><p>Continue with the part of Papina Farms that is most relevant to your work.</p></div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
            @foreach ([['website.services', 'Services & Enterprises', 'Explore farmer support, agro-processing, marketing, youth empowerment, village banks and consultancy.'], ['website.markets', 'Markets & Partnership Opportunities', 'Review market channels, priority stakeholders and the areas where we seek collaboration.'], ['website.membership', 'Farmers & Group Enquiries', 'Learn how farmer groups, cooperatives and producer organisations connect with Papina Farms.'], ['website.contact', 'Contact the Mzuzu Team', 'Use our head office address, telephone numbers and email to discuss your enquiry.']] as [$routeName, $title, $text])
                <a href="{{ route($routeName) }}" class="resource-link rounded-xl p-space-lg bg-surface-container-lowest block"><h3 class="font-headline-sm text-headline-sm text-primary font-bold flex items-center justify-between gap-space-sm">{{ $title }}<span aria-hidden="true" class="material-symbols-outlined text-[20px]">arrow_forward</span></h3><p class="text-body-md text-on-surface-variant mt-space-sm">{{ $text }}</p></a>
            @endforeach
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface">
    <div class="site-container grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <div><h2 class="font-headline-lg text-headline-lg text-primary font-bold">Group registration documents</h2><p class="text-body-lg text-on-surface-variant mt-space-md">The official registration form is not yet available to download. Contact our team for current guidance before preparing or submitting an application.</p></div>
        <div class="rounded-xl bg-surface-container-low p-space-lg"><p class="font-label-lg text-label-lg text-primary">Official registration form coming soon.</p><a href="{{ route('website.contact') }}" class="site-button site-button-primary mt-space-md">Contact Us</a></div>
    </div>
</section>
@endsection
