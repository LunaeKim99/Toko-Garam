<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[var(--danger)] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:brightness-90 focus:ring-2 focus:ring-[var(--danger)] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
