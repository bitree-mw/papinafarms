@props(['title' => 'Build a stronger agricultural value chain.', 'description' => 'Talk to our Mzuzu team about farmer development, market access, enterprise support or partnership opportunities.'])
<section class="py-space-xl bg-surface-container-low">
    <div class="site-container">
        <div class="contact-strip rounded-2xl bg-primary-container text-on-primary p-space-lg lg:p-space-xl grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">
            <div class="lg:col-span-8">
                <h2 class="font-headline-lg text-headline-lg font-bold">{{ $title }}</h2>
                <p class="text-body-lg text-surface-container-high mt-space-sm max-w-2xl">{{ $description }}</p>
            </div>
            <div class="lg:col-span-4 lg:justify-self-end">
                <a href="{{ route('website.contact') }}" class="site-button site-button-accent">Contact Us <span aria-hidden="true" class="material-symbols-outlined text-[20px]">arrow_forward</span></a>
            </div>
        </div>
    </div>
</section>
