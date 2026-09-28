<div class="company-contacts flex flex-col gap-space-md">
    <div class="flex items-start gap-space-sm">
        <span aria-hidden="true" class="material-symbols-outlined text-[22px]">location_on</span>
        <address class="not-italic">{{ config('company.address') }}<br>{{ config('company.postal_address') }}</address>
    </div>
    <a href="mailto:{{ config('company.email') }}" class="flex items-start gap-space-sm hover:underline">
        <span aria-hidden="true" class="material-symbols-outlined text-[22px]">mail</span>
        <span class="break-all">{{ config('company.email') }}</span>
    </a>
    @foreach (config('company.phones') as $phone)
        <a href="tel:{{ $phone['uri'] }}" class="flex items-center gap-space-sm hover:underline">
            <span aria-hidden="true" class="material-symbols-outlined text-[22px]">call</span>{{ $phone['label'] }}
        </a>
    @endforeach
</div>
