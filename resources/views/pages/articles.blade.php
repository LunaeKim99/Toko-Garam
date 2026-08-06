@extends('layouts.app')

@section('meta_title', 'Artikel & Edukasi — Garam Nusantara')
@section('meta_description', 'Artikel edukasi seputar garam, kesehatan, industri, dan tips memilih garam berkualitas.')

@section('content')
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80">
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Artikel & Edukasi</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Artikel</span>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom">
        {{-- Featured Article --}}
        @if(isset($articles[0]))
            <a href="#" class="group block bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden mb-10"
                data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="overflow-hidden">
                        <img src="{{ $articles[0]['image'] }}" alt="{{ $articles[0]['title'] }}"
                            class="w-full h-64 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 lg:p-8 flex flex-col justify-center">
                        <span class="inline-block w-fit px-3 py-1 bg-primary/10 text-primary text-xs font-medium rounded-lg mb-3">
                            {{ $articles[0]['category'] }}
                        </span>
                        <h2 class="text-xl sm:text-2xl font-bold text-dark group-hover:text-primary transition-colors mb-3">
                            {{ $articles[0]['title'] }}
                        </h2>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $articles[0]['excerpt'] }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-xs text-gray-400">
                                <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                                <span>{{ $articles[0]['date'] }}</span>
                            </div>
                            <span class="inline-flex items-center gap-1 text-sm font-medium text-primary">
                                Baca Selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        @endif

        {{-- Article Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach(array_slice($articles, 1) as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta')
@endsection