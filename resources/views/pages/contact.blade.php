@extends('layouts.app')

@section('meta_title', 'Kontak — Garam Nusantara')
@section('meta_description', 'Hubungi Garam Nusantara untuk pemesanan dan informasi produk garam.')

@section('content')
<section class="relative py-24 bg-gradient-to-br from-dark to-primary/80">
    <div class="relative container-custom text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-3">Hubungi Kami</h1>
        <div class="flex items-center justify-center gap-2 text-sm text-white/70">
            <a href="{{ route('home') }}" class="hover:text-white">Home</a>
            <span>/</span>
            <span>Kontak</span>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12">

            {{-- Contact Info --}}
            <div class="lg:col-span-2 space-y-6" data-aos="fade-right">
                {{-- Address --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-dark text-sm mb-1">Alamat</h3>
                            <p class="text-gray-500 text-sm">{{ $contactInfo['address'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- Phone --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="phone" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-dark text-sm mb-1">Telepon</h3>
                            <p class="text-gray-500 text-sm">{{ $contactInfo['phone'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- WhatsApp --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-green-500"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-dark text-sm mb-1">WhatsApp</h3>
                            <a href="https://wa.me/6281234567890" target="_blank" class="text-green-500 text-sm hover:underline">
                                {{ $contactInfo['whatsapp'] }}
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="mail" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-dark text-sm mb-1">Email</h3>
                            <p class="text-gray-500 text-sm">{{ $contactInfo['email'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- Hours --}}
                <div class="bg-white p-5 rounded-xl shadow-sm border border-light-gray">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="clock" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-dark text-sm mb-2">Jam Operasional</h3>
                            <div class="space-y-1">
                                @foreach($contactInfo['hours'] as $day => $hour)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-500">{{ $day }}</span>
                                        <span class="text-dark font-medium {{ $hour === 'Libur' ? 'text-red-500' : '' }}">{{ $hour }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Social --}}
                <div class="flex gap-3">
                    @foreach(['facebook', 'instagram', 'twitter'] as $social)
                        <a href="#" class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center hover:bg-primary hover:text-white text-primary transition-all duration-300">
                            <i data-lucide="{{ $social }}" class="w-5 h-5"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-3" data-aos="fade-left">
                <div class="bg-white p-6 lg:p-8 rounded-xl shadow-sm border border-light-gray">
                    <h2 class="text-xl font-bold text-dark mb-6">Kirim Pesan</h2>
                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-dark mb-1.5">Nama</label>
                                <input type="text" name="name" required
                                    class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-dark mb-1.5">Email</label>
                                <input type="email" name="email" required
                                    class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Subjek</label>
                            <input type="text" name="subject" required
                                class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1.5">Pesan</label>
                            <textarea name="message" rows="5" required
                                class="w-full px-4 py-3 border border-light-gray rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none text-sm resize-none"></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full sm:w-auto">
                            Kirim Pesan
                            <i data-lucide="send" class="w-4 h-4"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>

        {{-- Google Maps --}}
        <div class="mt-12 rounded-xl overflow-hidden shadow-sm" data-aos="fade-up">
            <iframe
                src="{{ $contactInfo['map_embed'] }}"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
@endsection
