@extends('layouts.app')

@section('meta_title', $product['name'] . ' — Garam Nusantara')
@section('meta_description', $product['description'])

@section('content')
<section class="pt-24 pb-8">
    <div class="container-custom">
        <div class="flex items-center gap-2 text-sm text-gray-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-primary">Home</a>
            <span>/</span>
            <a href="{{ route('products') }}" class="hover:text-primary">Produk</a>
            <span>/</span>
            <span class="text-dark">{{ $product['name'] }}</span>
        </div>
    </div>
</section>

<section class="section-padding pt-0">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            {{-- Gallery --}}
            <div data-aos="fade-right" x-data="{ activeImage: 0, images: @json($product['gallery']) }">
                <div class="overflow-hidden rounded-xl mb-3">
                    <img :src="images[activeImage]" :alt="{{ json_encode($product['name']) }}"
                        class="w-full h-80 sm:h-96 object-cover">
                </div>
                <div class="flex gap-2">
                    <template x-for="(img, index) in images" :key="index">
                        <button @click="activeImage = index"
                            class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 transition-all"
                            :class="activeImage === index ? 'border-primary' : 'border-transparent opacity-70 hover:opacity-100'">
                            <img :src="img" alt="" class="w-full h-full object-cover">
                        </button>
                    </template>
                </div>
            </div>

            {{-- Info --}}
            <div data-aos="fade-left">
                <span class="inline-block px-3 py-1 bg-primary/10 text-primary text-sm font-medium rounded-lg mb-3">
                    {{ $product['category'] }}
                </span>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-dark mb-2">{{ $product['name'] }}</h1>
                <span class="inline-block text-gray-400 text-sm mb-4">{{ $product['weight'] }}</span>
                <p class="text-gray-500 leading-relaxed mb-6">{{ $product['description'] }}</p>

                <div class="flex flex-col sm:flex-row gap-3 mb-8">
                    <a href="https://wa.me/6281234567890?text=Halo, saya ingin memesan {{ $product['name'] }}" target="_blank" class="btn-whatsapp">
                        <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Hubungi via WhatsApp
                    </a>
                    <a href="{{ route('contact') }}" class="btn-primary">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>

        {{-- Specs & Benefits --}}
        <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8" data-aos="fade-up">
            {{-- Specs --}}
            <div class="bg-light rounded-xl p-6">
                <h3 class="font-semibold text-dark mb-4 flex items-center gap-2">
                    <i data-lucide="clipboard-list" class="w-5 h-5 text-primary"></i>
                    Spesifikasi
                </h3>
                <table class="w-full text-sm">
                    <tbody>
                        @foreach($product['specifications'] as $key => $value)
                            <tr class="border-b border-light-gray last:border-0">
                                <td class="py-2 text-gray-500">{{ $key }}</td>
                                <td class="py-2 text-dark font-medium text-right">{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Benefits --}}
            <div class="bg-light rounded-xl p-6">
                <h3 class="font-semibold text-dark mb-4 flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-primary"></i>
                    Manfaat
                </h3>
                <ul class="space-y-2">
                    @foreach($product['benefits'] as $benefit)
                        <li class="flex items-start gap-2 text-sm text-gray-600">
                            <i data-lucide="check" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0"></i>
                            {{ $benefit }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Related Products --}}
        <div class="mt-16">
            <x-section-heading title="Produk Terkait" />
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($product['related'] as $related)
                    <x-product-card :product="$related" />
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('partials.cta')
@endsection