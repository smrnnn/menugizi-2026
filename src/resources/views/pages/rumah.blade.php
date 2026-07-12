@extends('layouts.nutrikids')

@section('content')
<div class="fade-up">
    <div class="bg-white rounded-2xl border border-[#53CBF3] p-8 text-center shadow-sm">
        <h1 class="text-3xl font-bold text-[#111FA2] mb-4">🌱 Selamat Datang di ItsSumi</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Sistem rekomendasi menu gizi balita berbasis standar Kemenkes RI.
        </p>
        <a href="{{ route('rekomendasi') }}" 
           class="inline-block mt-6 bg-[#5478FF] hover:bg-[#3A5FEB] text-white font-semibold rounded-xl px-8 py-3 transition">
            Mulai Rekomendasi →
        </a>
    </div>
</div>
@endsection