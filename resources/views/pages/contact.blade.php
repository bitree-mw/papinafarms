@extends('layouts.app')
@section('title', 'Contact Us | Papina Farms')
@section('content')
<x-page-intro label="Contact Us" title="Let’s grow the conversation." description="Connect with our Mzuzu team about farmer development, market access, enterprise support or a potential partnership." />
<section class="py-space-xl bg-surface">
    <div class="site-container grid grid-cols-1 lg:grid-cols-12 gap-gutter items-stretch">
        <div class="lg:col-span-5 bg-primary-container text-on-primary rounded-2xl p-space-lg lg:p-space-xl">
            <h2 class="font-headline-lg text-headline-lg font-bold mb-space-lg">Papina Farms head office</h2>
            @include('partials.company-contacts')
            <p class="text-body-md text-surface-container-high mt-space-xl">Based in Mzuzu, Malawi, with a focus on local, national and wider regional agricultural opportunities.</p>
        </div>
        <div class="lg:col-span-7 bg-surface-container-lowest rounded-2xl p-space-lg lg:p-space-xl">
            <h2 class="font-headline-lg text-headline-lg text-primary font-bold">Tell us how we can work together</h2>
            <p class="text-body-lg text-on-surface-variant mt-space-md">Choose a topic to open an email to our team. Include your organisation, location and a brief outline of what you would like to discuss.</p>
            <div class="enquiry-links mt-space-lg">
                @foreach ([['Farmer & cooperative support', 'Farmer and cooperative enquiry'], ['Buying, off-taking & market access', 'Buyer and market access enquiry'], ['Partnerships & investment', 'Partnership and investment enquiry'], ['Youth & village enterprise programmes', 'Youth and village enterprise enquiry'], ['General enquiry', 'General enquiry']] as [$label, $subject])
                    <a href="mailto:{{ config('company.email') }}?subject={{ rawurlencode($subject) }}" class="flex items-center justify-between gap-space-md py-space-md text-primary font-label-lg text-label-lg hover:underline"><span>{{ $label }}</span><span aria-hidden="true" class="material-symbols-outlined text-[20px]">arrow_forward</span></a>
                @endforeach
            </div>
            <p class="text-body-sm text-on-surface-variant mt-space-md">Email links open your email application. You can also call either number listed here.</p>
        </div>
    </div>
</section>
<section class="py-space-xl bg-surface-container-low">
    <div class="site-container grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <img src="{{ asset('images/farmer-cooperative.webp') }}" srcset="{{ asset('images/farmer-cooperative-640.webp') }} 640w, {{ asset('images/farmer-cooperative.webp') }} 1200w" sizes="(max-width: 767px) calc(100vw - 40px), 660px" alt="Farmer cooperative meeting in Malawi" width="1200" height="896" loading="lazy" class="rounded-2xl w-full object-cover">
        <div><h2 class="font-headline-lg text-headline-lg text-primary font-bold">A shared starting point</h2><p class="text-body-lg text-on-surface-variant mt-space-md">Read our company profile for an overview of our cooperative roots, core operations and partnership priorities before we speak.</p><a href="{{ route('website.resources') }}" class="site-button site-button-primary mt-space-lg">View Resources</a></div>
    </div>
</section>
@endsection
