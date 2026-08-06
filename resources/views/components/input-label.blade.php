@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[var(--text-secondary)] transition-colors duration-300']) }}>
    {{ $value ?? $slot }}
</label>
