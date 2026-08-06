<section class="section-padding bg-surface transition-colors duration-300" id="lokasi">
    <div class="container-custom">
        <x-section-heading title="Lokasi Tambak Kami" subtitle="Diproduksi langsung dari pesisir Jepara, Jawa Tengah" />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 mt-12">
            <div class="bg-[var(--surface)] p-6 lg:p-8 rounded-xl shadow-sm-aj border border-[var(--border)]">
                <p class="text-[var(--text-secondary)] leading-relaxed mb-6 transition-colors duration-300">
                    Garam Nusantara diproduksi langsung dari tambak garam kami di pesisir utara Jepara, Jawa Tengah.
                    Kami menggunakan teknik penjemuran alami tradisional yang telah turun-temurun dipraktikkan oleh petani garam lokal,
                    menghasilkan garam dengan kandungan mineral alami yang tinggi dan rasa khas laut Jepara.
                </p>
                <a href="{{ route('contact') }}" class="btn-primary">
                    <i data-lucide="map-pin" class="w-4 h-4"></i>
                    Lihat Lokasi
                </a>
            </div>

            <div class="rounded-xl overflow-hidden shadow-sm-aj border border-[var(--border)] h-72 bg-[var(--surface-secondary)]">
                <iframe
                    src="https://www.google.com/maps?q=-6.666499428336486,110.64402441302167&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
