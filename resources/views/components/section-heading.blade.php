@props(['title', 'subtitle' => ''])

<div class="text-center mb-12 lg:mb-16" data-aos="fade-up">
    @if($subtitle)
        <p class="text-primary font-medium text-sm uppercase tracking-wider mb-2">{{ $subtitle }}</p>
    @endif
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-dark dark:text-white transition-colors duration-300">{{ $title }}</h2>
</div>