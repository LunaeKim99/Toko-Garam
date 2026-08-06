@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors duration-300 dark:bg-slate-700 dark:border-slate-600 dark:text-slate-100']) }}>
