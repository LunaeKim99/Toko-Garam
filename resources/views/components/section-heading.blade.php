@props(['title', 'subtitle' => ''])

<div class="text-center mb-12 lg:mb-16" data-aos="fade-up">
    @if($subtitle)
        <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">{{ $subtitle }}</p>
    @endif
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[var(--text)]">{{ $title }}</h2>
    @if($subtitle)
        <div class="w-16 h-1 bg-accent mx-auto mt-4 rounded-full"></div>
    @endif
</div>