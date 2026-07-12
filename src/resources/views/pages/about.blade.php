@extends('layouts.nutrikids')

@section('content')
<div class="fade-up max-w-4xl mx-auto space-y-6">

    {{-- Header --}}
    <div class="bg-white rounded-2xl border border-[#53CBF3] p-6 sm:p-8 shadow-sm">
        <h1 class="text-2xl sm:text-3xl font-bold text-[#111FA2] mb-4">🌱 Tentang ItsSumi</h1>
        <p class="text-gray-600 leading-relaxed">
            <strong>ItsSumi</strong> adalah sistem rekomendasi menu gizi balita berbasis web yang 
            dirancang untuk membantu orang tua dalam menentukan menu makanan yang sesuai dengan 
            kebutuhan gizi anak secara cepat, mudah, dan personal.
        </p>
    </div>

    {{-- Grid 2 kolom --}}
    <div class="grid sm:grid-cols-2 gap-4">

        {{-- Standar --}}
        <div class="bg-white rounded-2xl border border-[#53CBF3] p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-[#EEF2FF] rounded-xl flex items-center justify-center">
                    <span class="text-xl">📋</span>
                </div>
                <h3 class="font-semibold text-[#111FA2]">Standar yang Digunakan</h3>
            </div>
            <ul class="space-y-2 text-sm text-gray-600">
                <li class="flex gap-2">
                    <span class="text-[#5478FF]">✅</span>
                    <span><strong>Permenkes No. 28 Tahun 2019</strong> — Angka Kecukupan Gizi (AKG)</span>
                </li>
                <li class="flex gap-2">
                    <span class="text-[#5478FF]">✅</span>
                    <span><strong>Permenkes No. 2 Tahun 2020</strong> — Standar Antropometri Anak</span>
                </li>
                <li class="flex gap-2">
                    <span class="text-[#5478FF]">✅</span>
                    <span><strong>WHO Child Growth Standards</strong> — Standar pertumbuhan global</span>
                </li>
            </ul>
        </div>

        {{-- Privasi --}}
        <div class="bg-white rounded-2xl border border-[#53CBF3] p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-[#FFFDE8] rounded-xl flex items-center justify-center">
                    <span class="text-xl">🔒</span>
                </div>
                <h3 class="font-semibold text-[#111FA2]">Privasi Data</h3>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed">
                Data balita yang Anda input <strong>hanya digunakan untuk proses rekomendasi</strong> 
                dan <strong>tidak disimpan</strong> di database. Setelah Anda menutup halaman hasil, 
                semua data akan hilang. Privasi Anda adalah prioritas kami.
            </p>
        </div>
    </div>

    {{-- Grid 3 kolom --}}
    <div class="grid sm:grid-cols-3 gap-4">

        <div class="bg-white rounded-2xl border border-[#53CBF3] p-5 text-center shadow-sm">
            <div class="text-3xl mb-2">👨‍👩‍👦</div>
            <h4 class="font-semibold text-[#111FA2] text-sm">Untuk Orang Tua</h4>
            <p class="text-xs text-gray-400 mt-1">Dapatkan rekomendasi menu sesuai usia & kondisi anak</p>
        </div>

        <div class="bg-white rounded-2xl border border-[#53CBF3] p-5 text-center shadow-sm">
            <div class="text-3xl mb-2">🛠️</div>
            <h4 class="font-semibold text-[#111FA2] text-sm">Untuk Admin</h4>
            <p class="text-xs text-gray-400 mt-1">Kelola data menu, kategori, dan alergen</p>
        </div>

        <div class="bg-white rounded-2xl border border-[#53CBF3] p-5 text-center shadow-sm">
            <div class="text-3xl mb-2">⚡</div>
            <h4 class="font-semibold text-[#111FA2] text-sm">Metode</h4>
            <p class="text-xs text-gray-400 mt-1">Data yang digunakan untuk rekomendasi ini adalah data gizi anak</p>
        </div>
    </div>

    {{-- Disclaimer --}}
    <div class="bg-[#FFFDE8] border-l-4 border-[#FFDE42] p-5 rounded-xl">
        <p class="text-sm text-[#967500] leading-relaxed">
            <strong>⚠️ Disclaimer:</strong> Sistem ini hanya sebagai <strong>alat bantu rekomendasi</strong> 
            dan <strong>bukan pengganti</strong> konsultasi dengan dokter, ahli gizi, atau tenaga kesehatan profesional.
            Selalu konsultasikan kondisi kesehatan anak Anda dengan tenaga medis yang kompeten.
        </p>
    </div>

    <div class="text-center text-sm text-gray-400">
        <p>Dibangun dengan ❤️ untuk generasi sehat Indonesia</p>
    </div>
</div>
@endsection