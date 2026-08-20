@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-[var(--success)] transition-colors duration-300']) }}>
        {{ $status }}
    </div>
@endif
