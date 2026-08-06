@props(['article'])

<a href="#"
    class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden"
    data-aos="fade-up">

    <div class="overflow-hidden">
        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}"
            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
    </div>

    <div class="p-5">
        <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-xs font-medium rounded-lg mb-2">
            {{ $article['category'] }}
        </span>

        <h3 class="font-semibold text-dark group-hover:text-primary transition-colors duration-300 mb-2 line-clamp-2">
            {{ $article['title'] }}
        </h3>

        <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $article['excerpt'] }}</p>

        <div class="flex items-center gap-2 text-xs text-gray-400">
            <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
            <span>{{ $article['date'] }}</span>
        </div>
    </div>
</a>