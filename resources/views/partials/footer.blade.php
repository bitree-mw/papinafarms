<footer class="w-full bg-primary-container text-on-primary pt-space-xl pb-space-lg">
<div class="max-w-[1440px] mx-auto px-margin-mobile lg:px-margin">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-gutter mb-space-xl">
<div class="lg:col-span-4 flex flex-col gap-space-md">
<div class="flex items-center gap-space-md">
<img alt="Papina Farms logo" class="h-8 w-auto object-contain " src="{{ asset('images/papina-icon-large.webp') }}" width="200" height="200" loading="lazy" decoding="async"/>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-primary font-bold leading-none">PAPINA FARMS LTD</span>
<span class="font-label-sm text-label-sm text-on-primary-container tracking-wider uppercase mt-space-xs">Mzuzu, Malawi</span>
</div>
</div>
<p class="font-body-md text-body-md text-surface-container-high leading-relaxed">Empowering smallholder farmers, agricultural cooperatives, and modern value chains across Malawi. Headquartered in Mzuzu, Northern Region, championing sustainable agronomy and food security.</p>
</div>
<div class="lg:col-span-2 flex flex-col gap-space-sm">
<span class="font-headline-sm text-label-lg text-tertiary-fixed uppercase tracking-wider mb-space-xs">Quick Links</span>
<a class="font-body-md text-body-md text-surface-container-high hover:text-on-primary transition-colors" data-path="home" href="{{ route('website.home') }}">Home</a>
<a class="font-body-md text-body-md text-surface-container-high hover:text-on-primary transition-colors" data-path="about-us" href="{{ route('website.about') }}">About Us</a>
<a class="font-body-md text-body-md text-surface-container-high hover:text-on-primary transition-colors" data-path="what-we-do" href="{{ route('website.services') }}">What We Do</a>
<a class="font-body-md text-body-md text-surface-container-high hover:text-on-primary transition-colors" data-path="resources" href="{{ route('website.resources') }}">Resources</a>
<a class="font-body-md text-body-md text-surface-container-high hover:text-on-primary transition-colors" data-path="contact-us" href="{{ route('website.contact') }}">Contact Us</a>
</div>
<div class="lg:col-span-3 flex flex-col gap-space-sm">
<span class="font-headline-sm text-label-lg text-tertiary-fixed uppercase tracking-wider mb-space-xs">Explore Papina</span>
<a class="font-body-md text-body-md text-surface-container-high hover:text-on-primary transition-colors" data-path="farmers-membership" href="{{ route('website.membership') }}">Farmers Membership</a>
<a class="font-body-md text-body-md text-surface-container-high hover:text-on-primary transition-colors" data-path="markets-partners" href="{{ route('website.markets') }}">Buyer Inquiries</a>
<a class="font-body-md text-body-md text-surface-container-high hover:text-on-primary transition-colors" data-path="markets-partners" href="{{ route('website.markets') }}">Partner With Us</a>
<a class="font-body-md text-body-md text-surface-container-high hover:text-on-primary transition-colors" data-path="become-a-group-member" href="{{ route('website.membership') }}#registration">Outgrower Application</a>
</div>
<div class="lg:col-span-3 flex flex-col gap-space-sm">
<span class="font-headline-sm text-label-lg text-tertiary-fixed uppercase tracking-wider mb-space-xs">Contact Info</span>
@include('partials.company-contacts')
</div>
</div>
<div class="pt-space-md border-t border-primary/40 flex flex-col sm:flex-row items-center justify-between gap-space-sm text-surface-container-high font-body-sm text-body-sm">
<p>© {{ date('Y') }} Papina Farms Ltd. All rights reserved. Registered in Malawi.</p>
<div class="flex items-center gap-space-md">
<span class="text-tertiary-fixed font-label-sm text-label-sm">Mzuzu Hub</span>
<span>•</span>
<span class="text-surface-container-high font-label-sm text-label-sm">Sustainable Malawian Agriculture</span>
</div>
</div>
</div>
</footer>