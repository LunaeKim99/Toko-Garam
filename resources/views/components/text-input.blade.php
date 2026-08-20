@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[var(--border)] focus:border-primary focus:ring-primary focus:ring-2 rounded-xl transition-all duration-300 bg-[var(--background)] text-[var(--text)] placeholder-[var(--text-muted)]']) }}>
