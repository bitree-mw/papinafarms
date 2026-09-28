@props(['title', 'label', 'description', 'image' => null, 'alt' => ''])
<section class="page-intro bg-surface-container-lowest relative overflow-hidden">
    <div class="site-container grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">
        <div class="{{ $image ? 'lg:col-span-7' : 'lg:col-span-10' }}">
            <p class="text-secondary font-label-md text-label-md uppercase tracking-wider mb-space-md">{{ $label }}</p>
            <h1 class="page-title font-display-lg text-primary font-extrabold tracking-tight">{{ $title }}</h1>
            <p class="text-body-xl text-on-surface-variant max-w-2xl mt-space-lg">{{ $description }}</p>
            @if ($slot->isNotEmpty())
                <div class="flex flex-wrap gap-space-sm mt-space-lg">{{ $slot }}</div>
            @endif
        </div>
        @if ($image)
            <div class="lg:col-span-5">
                <img src="{{ asset('images/'.$image.'.webp') }}" alt="{{ $alt }}" width="1200" height="896" class="page-intro-image rounded-2xl w-full object-cover" fetchpriority="high">
            </div>
        @endif
    </div>
</section>
