@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors duration-300 dark:bg-[#111827] dark:border-gray-600 dark:text-white']) }}>
