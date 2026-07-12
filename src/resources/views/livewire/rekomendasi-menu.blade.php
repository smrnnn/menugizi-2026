<div>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- STEP: FORM                                              --}}
{{-- ═══════════════════════════════════════════════════════ --}}
@if ($step === 'form')

<div class="space-y-5 fade-up">

    {{-- Hero dashboard --}}
    <div class="bg-white rounded-2xl border border-[#53CBF3] overflow-hidden shadow-sm">
        <div class="flex flex-col lg:flex-row">
            <div class="flex-1 p-6 sm:p-8">
                <div class="inline-flex items-center gap-2 bg-[#EEF2FF] text-[#111FA2] border border-[#5478FF] text-xs font-medium px-3 py-1.5 rounded-full mb-4">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Berbasis standar WHO & Kemenkes RI
                </div>
                <h1 class="text-[clamp(1.5rem,1rem+2vw,2.75rem)] font-semibold text-[#111FA2] leading-tight mb-2">
                    Temukan menu terbaik<br><span class="text-[#5478FF]">untuk si kecil</span>
                </h1>
                <p class="text-[clamp(0.875rem,0.5rem+0.8vw,1.05rem)] text-[#111FA2]/70 leading-relaxed max-w-xl">
                    Masukkan data anak dan sistem akan merekomendasikan menu makanan sesuai kebutuhan gizi, usia, dan kondisi kesehatannya.
                </p>
                <div class="flex flex-wrap gap-2 mt-5">
                    {{-- Menu --}}
                    <div class="flex items-center gap-2 bg-[#EEF2FF] border border-[#5478FF] rounded-lg px-3 py-1.5">
                        <div class="w-5 h-5 bg-[#5478FF] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-[#111FA2] leading-tight">{{ $totalMenu }} Menu</p>
                            <p class="text-[10px] text-[#5478FF] leading-tight">tersedia</p>
                        </div>
                    </div>

                    {{-- Kelompok --}}
                    <div class="flex items-center gap-2 bg-[#FFFDE8] border border-[#FFDE42] rounded-lg px-3 py-1.5">
                        <div class="w-5 h-5 bg-[#FFDE42] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-3 h-3 text-[#111FA2]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-[#967500] leading-tight">{{ $totalKategoriUsia }} Kelompok</p>
                            <p class="text-[10px] text-[#FFDE42] leading-tight">usia balita</p>
                        </div>
                    </div>

                    {{-- Alergen --}}
                    <div class="flex items-center gap-2 bg-[#FFE8E8] border border-[#FF6B6B] rounded-lg px-3 py-1.5">
                        <div class="w-5 h-5 bg-[#FF6B6B] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-[#8B0000] leading-tight">Filter Alergen</p>
                            <p class="text-[10px] text-[#FF6B6B] leading-tight">{{ $totalAlergen }} jenis</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Ilustrasi --}}
            <div class="hidden lg:flex items-center justify-center p-10 bg-gradient-to-br from-[#EEF2FF] to-[#FFFDE8] min-w-[200px]">
                <svg class="w-28 h-28 text-[#5478FF]" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 80 80">
                    <circle cx="40" cy="26" r="14" stroke-width="1.5"/>
                    <circle cx="34" cy="23" r="2" fill="currentColor" stroke="none"/>
                    <circle cx="46" cy="23" r="2" fill="currentColor" stroke="none"/>
                    <path stroke-linecap="round" d="M34 31c2 2.5 10 2.5 12 0" stroke-width="1.5"/>
                    <path stroke-linecap="round" d="M22 68c0-9.9 8.1-18 18-18s18 8.1 18 18" stroke-width="1.5"/>
                    <path stroke-linecap="round" d="M32 54c2 4 4 7 8 10M48 54c-2 4-4 7-8 10" stroke-width="1.2"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Form card --}}
    <div class="bg-white rounded-2xl border border-[#53CBF3] shadow-sm">
        <div class="px-6 py-4 border-b border-[#53CBF3] flex items-center gap-3">
            <div class="w-8 h-8 bg-[#EEF2FF] rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-[#5478FF]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-[#111FA2]">Data anak</p>
                <p class="text-xs text-gray-400">Isi lengkap untuk hasil yang lebih akurat</p>
            </div>
        </div>

        <form wire:submit.prevent="cariRekomendasi" class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

                {{-- Nama --}}
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">
                        Nama anak <span class="text-gray-300 font-normal normal-case tracking-normal">(opsional)</span>
                    </label>
                    <input type="text" wire:model="namaAnak" placeholder="cth. Aisyah"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-[#111FA2]
                                  placeholder-gray-300 bg-gray-50 hover:border-[#5478FF] transition">
                </div>

                {{-- Tanggal lahir --}}
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">
                        Tanggal lahir <span class="text-[#FF6B6B]">*</span>
                    </label>
                    <input type="date" wire:model="tanggalLahir" max="{{ date('Y-m-d') }}"
                           class="w-full border rounded-xl px-4 py-2.5 text-sm text-[#111FA2] bg-gray-50 hover:border-[#5478FF] transition
                                  @error('tanggalLahir') border-[#FF6B6B] bg-[#FFE8E8] @else border-gray-200 @enderror">
                    @error('tanggalLahir')<p class="text-[#FF6B6B] text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>

                {{-- Jenis kelamin --}}
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">
                        Jenis kelamin <span class="text-[#FF6B6B]">*</span>
                    </label>
                    <div class="grid grid-cols-2 gap-2">
                        <button type="button" wire:click="$set('jenisKelamin','L')"
                                class="flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-sm font-medium border transition
                                       {{ $jenisKelamin==='L' ? 'bg-[#5478FF] border-[#5478FF] text-white' : 'bg-gray-50 border-gray-200 text-gray-500 hover:border-[#5478FF]' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path stroke-linecap="round" d="M16 16h4m-2-2v4"/></svg>
                            Laki-laki
                        </button>
                        <button type="button" wire:click="$set('jenisKelamin','P')"
                                class="flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-sm font-medium border transition
                                       {{ $jenisKelamin==='P' ? 'bg-[#5478FF] border-[#5478FF] text-white' : 'bg-gray-50 border-gray-200 text-gray-500 hover:border-[#5478FF]' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path stroke-linecap="round" d="M12 12v8M9 17h6"/></svg>
                            Perempuan
                        </button>
                    </div>
                </div>

                {{-- BB --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">
                        Berat badan <span class="text-[#FF6B6B]">*</span>
                    </label>
                    <div class="relative">
                        <input type="number" wire:model="beratBadan" step="0.1" min="1" max="50" placeholder="0.0"
                               class="w-full border rounded-xl px-4 py-2.5 pr-12 text-sm text-[#111FA2] bg-gray-50 hover:border-[#5478FF] transition
                                      @error('beratBadan') border-[#FF6B6B] bg-[#FFE8E8] @else border-gray-200 @enderror">
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-400 font-medium">kg</span>
                    </div>
                    @error('beratBadan')<p class="text-[#FF6B6B] text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>

                {{-- TB --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">
                        Tinggi badan <span class="text-[#FF6B6B]">*</span>
                    </label>
                    <div class="relative">
                        <input type="number" wire:model="tinggiBadan" step="0.1" min="30" max="130" placeholder="0.0"
                               class="w-full border rounded-xl px-4 py-2.5 pr-12 text-sm text-[#111FA2] bg-gray-50 hover:border-[#5478FF] transition
                                      @error('tinggiBadan') border-[#FF6B6B] bg-[#FFE8E8] @else border-gray-200 @enderror">
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-400 font-medium">cm</span>
                    </div>
                    @error('tinggiBadan')<p class="text-[#FF6B6B] text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>

                {{-- Alergen --}}
                <div class="sm:col-span-2 xl:col-span-4">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">
                        Alergi / pantangan makanan <span class="text-gray-300 font-normal normal-case tracking-normal">(opsional)</span>
                    </label>
                    <p class="text-xs text-gray-400 mb-3">Centang bahan yang TIDAK bisa dikonsumsi anak</p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2">
                        @foreach ($alergens as $alergen)
                            @php $checked = in_array($alergen->id, $alergenDipilih); @endphp
                            <label class="flex items-center gap-3 rounded-xl px-3 py-3 border-2 cursor-pointer transition select-none
                                          {{ $checked
                                              ? 'bg-[#FFE8E8] border-[#FF6B6B] text-[#8B0000]'
                                              : 'bg-white border-gray-200 text-gray-600 hover:border-[#5478FF] hover:bg-[#EEF2FF]' }}">
                                <input type="checkbox" wire:model.live="alergenDipilih" value="{{ $alergen->id }}" class="sr-only">
                                <div class="w-5 h-5 rounded-md flex-shrink-0 flex items-center justify-center border-2 transition
                                            {{ $checked ? 'bg-[#FF6B6B] border-[#FF6B6B]' : 'bg-white border-gray-400' }}">
                                    @if ($checked)
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @endif
                                </div>
                                <span class="text-xs font-medium leading-tight">
                                    {{ $alergen->ikon ?? '🚫' }} {{ $alergen->nama }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                    @if (!empty($alergenDipilih))
                        <p class="text-xs text-[#FF6B6B] mt-2 font-medium">
                            ⚠️ {{ count($alergenDipilih) }} pantangan dipilih — menu yang mengandung bahan ini akan dikecualikan
                        </p>
                    @endif
                </div>
            </div>

            {{-- Footer form --}}
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 mt-6 pt-5 border-t border-[#53CBF3]">
                <div class="flex gap-2 flex-1 bg-[#EEF2FF] border border-[#5478FF] rounded-xl px-4 py-2.5">
                    <svg class="w-4 h-4 text-[#5478FF] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="text-xs text-[#111FA2] leading-relaxed">
                        Rekomendasi ini bersifat informatif berdasarkan standar Kemenkes RI, bukan pengganti konsultasi dokter atau ahli gizi.
                    </p>
                </div>
                <button type="submit" wire:loading.attr="disabled"
                        class="flex-shrink-0 flex items-center gap-2 bg-[#5478FF] hover:bg-[#3A5FEB] text-white font-semibold
                               rounded-xl px-6 py-3 text-sm transition disabled:opacity-60 w-full sm:w-auto justify-center">
                    <svg wire:loading.remove wire:target="cariRekomendasi" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/></svg>
                    <svg wire:loading wire:target="cariRekomendasi" class="w-4 h-4 spin-slow" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 12a8 8 0 018-8M12 4V2"/></svg>
                    <span wire:loading.remove wire:target="cariRekomendasi">Cari rekomendasi</span>
                    <span wire:loading wire:target="cariRekomendasi">Menganalisis...</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- STEP: HASIL                                             --}}
{{-- ═══════════════════════════════════════════════════════ --}}
@elseif ($step === 'hasil')

<div class="space-y-5 fade-up">

    {{-- Tombol kembali --}}
    <button wire:click="kembaliForm" class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-[#5478FF] transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke form
    </button>

    @if ($analisis)
    {{-- ── Kartu status ── --}}
    <div class="grid grid-cols-1 xl:grid-cols-[1fr_320px] gap-4">

        {{-- Kiri: info anak + metrics --}}
        <div class="bg-white rounded-2xl border border-[#53CBF3] p-5 shadow-sm">
            <div class="flex items-start gap-4 mb-5">
                <div class="w-12 h-12 bg-[#EEF2FF] rounded-2xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-[#5478FF]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <div class="flex-1">
                    <h2 class="font-semibold text-[#111FA2] text-base">{{ $namaAnak ?: 'Anak' }}</h2>
                    <p class="text-gray-400 text-sm mt-0.5">
                        {{ $analisis['usia_bulan'] }} bulan
                        @if($analisis['usia_bulan']>=12)
                            · {{ floor($analisis['usia_bulan']/12) }} thn {{ $analisis['usia_bulan']%12>0 ? $analisis['usia_bulan']%12 .' bln' : '' }}
                        @endif
                    </p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full border {{ $analisis['label_status']['gizi']['warna'] }}">
                            {{ $analisis['label_status']['gizi']['teks'] }}
                        </span>
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full border {{ $analisis['label_status']['tinggi']['warna'] }}">
                            {{ $analisis['label_status']['tinggi']['teks'] }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                @foreach([
                    ['label'=>'Berat badan','val'=>$beratBadan.' kg','sub'=>'Ideal: '.$analisis['bb_ideal'].' kg'],
                    ['label'=>'Tinggi badan','val'=>$tinggiBadan.' cm','sub'=>'Ideal: '.$analisis['tb_ideal'].' cm'],
                    ['label'=>'Kebutuhan kalori','val'=>number_format($analisis['kebutuhan_kalori']),'sub'=>'kcal / hari'],
                    ['label'=>'Kebutuhan protein','val'=>$analisis['kebutuhan_protein'].' g','sub'=>'per hari'],
                ] as $m)
                <div class="bg-gray-50 rounded-xl p-3">
                    <p class="text-xs text-gray-400 mb-1">{{ $m['label'] }}</p>
                    <p class="text-base font-semibold text-[#111FA2]">{{ $m['val'] }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $m['sub'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Kanan: alert + saran --}}
        <div class="space-y-3">
            @php
                $alertCls = match($analisis['status_gizi']) {
                    'gizi_buruk'=>'bg-[#FFE8E8] border-[#FF6B6B] text-[#8B0000]',
                    'gizi_kurang'=>'bg-[#FFFDE8] border-[#FFDE42] text-[#967500]',
                    'gizi_lebih'=>'bg-[#FFFDE8] border-[#FFDE42] text-[#967500]',
                    'obesitas'=>'bg-[#FFE8E8] border-[#FF6B6B] text-[#8B0000]',
                    default=>'bg-[#EEF2FF] border-[#5478FF] text-[#111FA2]'
                };
            @endphp
            <div class="rounded-2xl border p-4 {{ $alertCls }}">
                <p class="text-xs font-semibold uppercase tracking-wide opacity-60 mb-1">Status gizi</p>
                <p class="text-sm leading-relaxed">{{ $analisis['pesan_status'] }}</p>
            </div>
            <div class="bg-white rounded-2xl border border-[#53CBF3] p-4 shadow-sm">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Saran umum</p>
                <ul class="space-y-2">
                    @foreach(array_slice($analisis['saran_umum'],0,4) as $s)
                    <li class="flex gap-2 text-xs text-gray-500 leading-relaxed">
                        <span class="w-1 h-1 rounded-full bg-[#5478FF] flex-shrink-0 mt-1.5"></span>{{ $s }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- ── KEBUTUHAN GIZI LENGKAP ── --}}
    <div class="bg-white rounded-2xl border border-[#53CBF3] p-5 shadow-sm">
        <h3 class="text-sm font-semibold text-[#111FA2] mb-4">📊 Kebutuhan Gizi Harian (AKG)</h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            <div class="bg-[#EEF2FF] rounded-xl p-3 text-center">
                <p class="text-lg font-bold text-[#111FA2]">{{ number_format($analisis['kebutuhan_kalori']) }}</p>
                <p class="text-xs text-gray-400">Energi (kkal)</p>
            </div>
            <div class="bg-[#EEF2FF] rounded-xl p-3 text-center">
                <p class="text-lg font-bold text-[#111FA2]">{{ $analisis['kebutuhan_protein'] }}</p>
                <p class="text-xs text-gray-400">Protein (g)</p>
            </div>
            <div class="bg-[#EEF2FF] rounded-xl p-3 text-center">
                <p class="text-lg font-bold text-[#111FA2]">{{ $analisis['kebutuhan_lemak'] }}</p>
                <p class="text-xs text-gray-400">Lemak (g)</p>
            </div>
            <div class="bg-[#EEF2FF] rounded-xl p-3 text-center">
                <p class="text-lg font-bold text-[#111FA2]">{{ $analisis['kebutuhan_karbohidrat'] }}</p>
                <p class="text-xs text-gray-400">Karbo (g)</p>
            </div>
            <div class="bg-[#FFFDE8] rounded-xl p-3 text-center border border-[#FFDE42]">
                <p class="text-lg font-bold text-[#967500]">{{ $analisis['kebutuhan_serat'] }}</p>
                <p class="text-xs text-gray-400">Serat (g)</p>
            </div>
            <div class="bg-cyan-50 rounded-xl p-3 text-center border border-cyan-200">
                <p class="text-lg font-bold text-cyan-600">{{ $analisis['kebutuhan_air'] }}</p>
                <p class="text-xs text-gray-400">Air (ml)</p>
            </div>
        </div>
    </div>
    @endif

    {{-- ASI only --}}
    @if ($asiOnly)
    <div class="bg-white rounded-2xl border border-[#53CBF3] p-12 text-center shadow-sm">
        <div class="w-14 h-14 bg-[#EEF2FF] rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-7 h-7 text-[#5478FF]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h3 class="font-semibold text-[#111FA2] text-lg mb-2">🍼 ASI Eksklusif</h3>
        <p class="text-sm text-gray-400 leading-relaxed max-w-sm mx-auto">Bayi usia 0–5 bulan direkomendasikan mendapat ASI eksklusif. MPASI diperkenalkan mulai usia <strong class="text-[#5478FF]">6 bulan</strong>.</p>
    </div>

    {{-- Menu grid --}}
    @else
    <div>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
            <div>
                <h3 class="font-semibold text-[#111FA2]">🍽️ Menu rekomendasi</h3>
                <p class="text-xs text-gray-400 mt-0.5">{{ $kategori?->nama }}</p>
            </div>
        </div>

        {{-- Tab waktu makan --}}
        <div class="flex flex-wrap gap-1 bg-gray-100 rounded-xl p-1 mb-4">
            <button wire:click="setTab('makan_utama')"
                    class="px-3 sm:px-4 py-1.5 text-xs sm:text-sm font-medium rounded-lg transition whitespace-nowrap
                           {{ $tabAktif==='makan_utama' ? 'bg-white text-[#111FA2] shadow-sm' : 'text-gray-400 hover:text-gray-600' }}">
                🍽️ Makan Utama <span class="ml-1 text-xs opacity-60">({{ count($makanUtama) }})</span>
            </button>
            <button wire:click="setTab('selingan')"
                    class="px-3 sm:px-4 py-1.5 text-xs sm:text-sm font-medium rounded-lg transition whitespace-nowrap
                           {{ $tabAktif==='selingan' ? 'bg-white text-[#111FA2] shadow-sm' : 'text-gray-400 hover:text-gray-600' }}">
                🍪 Selingan <span class="ml-1 text-xs opacity-60">({{ count($selingan) }})</span>
            </button>
        </div>

        {{-- Bar filter --}}
        @if($tabAktif === 'makan_utama')
        <div class="flex flex-wrap gap-1.5 mb-4">
            <button wire:click="setFilter('semua')"
                    class="px-3 py-1 text-xs rounded-full transition
                           {{ $filterWaktu === 'semua' ? 'bg-[#5478FF] text-white' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
                Semua
            </button>
            <button wire:click="setFilter('sarapan')"
                    class="px-3 py-1 text-xs rounded-full transition
                           {{ $filterWaktu === 'sarapan' ? 'bg-[#5478FF] text-white' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
                🍳 Sarapan
            </button>
            <button wire:click="setFilter('makan_siang')"
                    class="px-3 py-1 text-xs rounded-full transition
                           {{ $filterWaktu === 'makan_siang' ? 'bg-[#5478FF] text-white' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
                🥗 Makan Siang
            </button>
            <button wire:click="setFilter('makan_malam')"
                    class="px-3 py-1 text-xs rounded-full transition
                           {{ $filterWaktu === 'makan_malam' ? 'bg-[#5478FF] text-white' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
                🍲 Makan Malam
            </button>
        </div>
        @endif

        @if(count($menuDitampil)>0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach($menuDitampil as $menu)
            <div class="bg-white rounded-xl border border-[#53CBF3] overflow-hidden hover:border-[#5478FF] hover:shadow-md transition-all">
                {{-- GAMBAR MENU --}}
                <div class="w-full h-36 relative overflow-hidden bg-gradient-to-br from-[#EEF2FF] to-[#FFFDE8] flex items-center justify-center">
                    @if(!empty($menu['foto']))
                        <div class="w-full h-full absolute inset-0 bg-cover bg-center"
                             style="background-image: url('{{ asset('storage/'.$menu['foto']) }}');">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center text-5xl"
                             style="background: linear-gradient(to bottom right, #EEF2FF, #FFFDE8);">
                            {{ $menu['waktu_makan']==='selingan' ? '🍪' : '🍽️' }}
                        </div>
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-5xl">
                            {{ $menu['waktu_makan']==='selingan' ? '🍪' : '🍽️' }}
                        </div>
                    @endif
                </div>

                <div class="p-4 flex flex-col h-[calc(100%-9rem)]">
                    <h4 class="text-sm font-semibold text-[#111FA2] leading-tight mb-2 line-clamp-2">{{ $menu['nama'] }}</h4>
                    <div class="flex flex-wrap gap-3 mb-3">
                        <span class="text-xs text-gray-400"><span class="font-medium text-[#111FA2]">{{ $menu['kalori'] }}</span> kcal</span>
                        <span class="text-xs text-gray-400">Protein <span class="font-medium text-gray-600">{{ $menu['protein'] }}g</span></span>
                        <span class="text-xs text-gray-400">Serat <span class="font-medium text-gray-600">{{ $menu['serat'] ?? 0 }}g</span></span>
                    </div>

                    <div class="mb-3 min-h-[24px]">
                        @if(!empty($menu['alergens']))
                            <div class="flex flex-wrap gap-1">
                                @foreach(array_slice($menu['alergens'],0,2) as $a)
                                    <span class="text-xs bg-[#FFE8E8] text-[#8B0000] border border-[#FF6B6B] rounded-full px-2 py-0.5">🚫 {{ $a }}</span>
                                @endforeach
                                @if(count($menu['alergens'])>2)
                                    <span class="text-xs text-gray-400">+{{ count($menu['alergens'])-2 }}</span>
                                @endif
                            </div>
                        @else
                            <span class="text-xs bg-[#EEF2FF] text-[#111FA2] border border-[#5478FF] rounded-full px-2 py-0.5">✅ Bebas Alergen</span>
                        @endif
                    </div>

                    <button wire:click="lihatDetail({{ $menu['id'] }})"
                            class="mt-auto w-full text-xs font-medium text-[#111FA2] border border-[#5478FF] rounded-lg py-2 hover:bg-[#EEF2FF] transition">
                        👀 Lihat detail →
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-white rounded-xl border border-dashed border-gray-200 p-12 text-center shadow-sm">
            <p class="text-gray-400 text-sm">Tidak ada menu untuk filter ini.</p>
            <p class="text-gray-300 text-xs mt-1">Coba kurangi pilihan alergen atau pilih filter lain.</p>
        </div>
        @endif
    </div>
    @endif
</div>

@endif

{{-- ═══════════════════════════════════════════════════════ --}}
{{-- MODAL DETAIL                                             --}}
{{-- ═══════════════════════════════════════════════════════ --}}
@if($showModal && $menuDetail)
<div wire:click="tutupModal" class="fixed inset-0 bg-black/30 z-50 backdrop-blur-sm"></div>
<div class="fixed bottom-0 left-0 right-0 z-50 slide-up" style="max-width:640px;margin:0 auto">
    <div class="bg-white rounded-t-3xl shadow-xl max-h-[92vh] overflow-y-auto">
        <div class="flex justify-center pt-3 pb-1">
            <div class="w-10 h-1 bg-gray-200 rounded-full"></div>
        </div>

        {{-- GAMBAR MODAL --}}
        <div class="w-full h-44 relative overflow-hidden bg-gradient-to-br from-[#EEF2FF] to-[#FFFDE8] flex items-center justify-center">
            @if(!empty($menuDetail['foto']))
                <div class="w-full h-full absolute inset-0 bg-cover bg-center"
                     style="background-image: url('{{ asset('storage/'.$menuDetail['foto']) }}');">
                </div>
                <div class="absolute inset-0 flex items-center justify-center text-7xl"
                     style="background: linear-gradient(to bottom right, #EEF2FF, #FFFDE8);">
                    {{ $menuDetail['waktu_makan']==='selingan' ? '🍪' : '🍽️' }}
                </div>
            @else
                <div class="absolute inset-0 flex items-center justify-center text-7xl">
                    {{ $menuDetail['waktu_makan']==='selingan' ? '🍪' : '🍽️' }}
                </div>
            @endif
        </div>

        <div class="p-6 space-y-5">
            <div>
                <h3 class="font-semibold text-[#111FA2] text-lg leading-tight mb-1">{{ $menuDetail['nama'] }}</h3>
                <p class="text-sm text-gray-400 leading-relaxed mb-3">{{ $menuDetail['deskripsi'] }}</p>
                <div class="flex flex-wrap gap-2 mb-2">
                    <span class="text-xs bg-[#EEF2FF] text-[#111FA2] border border-[#5478FF] px-2.5 py-1 rounded-full">{{ $kategori?->nama }}</span>
                    <span class="text-xs bg-[#FFFDE8] text-[#967500] border border-[#FFDE42] px-2.5 py-1 rounded-full">
                        {{ $menuDetail['waktu_makan']==='makan_utama' ? '🍽️ Makan utama' : '🍪 Selingan' }}
                    </span>
                </div>

                @if(!empty($menuDetail['alergens']))
                <div class="flex flex-wrap gap-1.5 pt-1 border-t border-gray-50">
                    <span class="text-xs text-gray-400 flex items-center gap-1">⚠️ Mengandung:</span>
                    @foreach($menuDetail['alergens'] as $a)
                        <span class="text-xs bg-[#FFE8E8] text-[#8B0000] border border-[#FF6B6B] px-2.5 py-1 rounded-full">🚫 {{ $a }}</span>
                    @endforeach
                </div>
                @else
                <div class="pt-1 border-t border-gray-50">
                    <span class="text-xs bg-[#EEF2FF] text-[#111FA2] border border-[#5478FF] px-2.5 py-1 rounded-full">✅ Bebas Alergen</span>
                </div>
                @endif
            </div>

            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Kandungan gizi per sajian</p>
                <div class="grid grid-cols-3 sm:grid-cols-4 gap-2">
                    <div class="bg-[#EEF2FF] rounded-xl p-3 text-center">
                        <p class="text-sm font-semibold text-[#111FA2]">{{ $menuDetail['kalori'] }}</p>
                        <p class="text-xs text-gray-400">kcal</p>
                        <p class="text-xs text-gray-400 mt-1">Kalori</p>
                    </div>
                    <div class="bg-[#EEF2FF] rounded-xl p-3 text-center">
                        <p class="text-sm font-semibold text-[#111FA2]">{{ $menuDetail['protein'] }}</p>
                        <p class="text-xs text-gray-400">g</p>
                        <p class="text-xs text-gray-400 mt-1">Protein</p>
                    </div>
                    <div class="bg-[#EEF2FF] rounded-xl p-3 text-center">
                        <p class="text-sm font-semibold text-[#111FA2]">{{ $menuDetail['lemak'] }}</p>
                        <p class="text-xs text-gray-400">g</p>
                        <p class="text-xs text-gray-400 mt-1">Lemak</p>
                    </div>
                    <div class="bg-[#EEF2FF] rounded-xl p-3 text-center">
                        <p class="text-sm font-semibold text-[#111FA2]">{{ $menuDetail['karbohidrat'] }}</p>
                        <p class="text-xs text-gray-400">g</p>
                        <p class="text-xs text-gray-400 mt-1">Karbo</p>
                    </div>
                    <div class="bg-[#FFFDE8] rounded-xl p-3 text-center border border-[#FFDE42]">
                        <p class="text-sm font-semibold text-[#967500]">{{ $menuDetail['serat'] ?? 0 }}</p>
                        <p class="text-xs text-gray-400">g</p>
                        <p class="text-xs text-gray-400 mt-1">Serat</p>
                    </div>
                    <div class="bg-cyan-50 rounded-xl p-3 text-center border border-cyan-200">
                        <p class="text-sm font-semibold text-cyan-600">{{ $menuDetail['air'] ?? 0 }}</p>
                        <p class="text-xs text-gray-400">ml</p>
                        <p class="text-xs text-gray-400 mt-1">Air</p>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-2">Zat besi: <span class="font-medium text-gray-600">{{ $menuDetail['zat_besi'] }} mg</span></p>
            </div>

            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">🛒 Bahan-bahan</p>
                <div class="bg-gray-50 rounded-xl px-4 py-3 text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $menuDetail['bahan'] }}</div>
            </div>

            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">👩‍🍳 Cara membuat</p>
                @php
                    $langkahLangkah = collect(preg_split('/\r\n|\r|\n/', $menuDetail['cara_masak']))
                        ->map(fn($s) => trim($s))
                        ->filter(fn($s) => $s !== '')
                        ->map(fn($s) => preg_replace('/^\d+\.\s*/', '', $s))
                        ->values();
                @endphp
                <div class="space-y-3">
                    @foreach($langkahLangkah as $i => $langkah)
                    <div class="flex gap-3">
                        <div class="w-6 h-6 bg-[#5478FF] rounded-full flex-shrink-0 flex items-center justify-center text-white text-xs font-semibold mt-0.5">{{ $i+1 }}</div>
                        <p class="text-sm text-gray-600 leading-relaxed pt-0.5">{{ rtrim($langkah, '.') }}.</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <button wire:click="tutupModal" class="w-full bg-[#5478FF] hover:bg-[#3A5FEB] text-white font-semibold rounded-xl py-3.5 text-sm transition">Tutup</button>
        </div>
    </div>
</div>
@endif

</div>