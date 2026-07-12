<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ItsSumi — Sistem Rekomendasi Menu Gizi Balita berbasis standar Kemenkes">
    <title>ItsSumi — Rekomendasi Menu Gizi Balita</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Warna utama dari permintaan ANDA
                        'primary-green': '#C1E59F',
                        'primary-green-dark': '#A3D78A',
                        'primary-red': '#FF5555',
                        'primary-peach': '#FF937E',

                        hijau: {
                            50:  '#F4FAEE',
                            100: '#E6F4D9',
                            200: '#D3EBBB',
                            300: '#C1E59F',   // warna utama
                            400: '#A3D78A',   // warna utama
                            500: '#8DC673',
                            600: '#72AD58',
                            700: '#589140',
                            800: '#3E732A',
                            900: '#255517',
                        },
                        sage: {
                            50:  '#F6FBF0',
                            100: '#EBF6DE',
                            200: '#D9EEC0',
                            300: '#C1E59F',
                            400: '#A3D78A',
                        },
                        peach: {
                            50:  '#FFF3F0',
                            100: '#FFE1DA',
                            200: '#FFC7BB',
                            300: '#FFA997',
                            400: '#FF937E',   // warna utama
                            500: '#FF7A62',
                            600: '#FF6B4F',
                            700: '#E8553A',
                            800: '#C23F26',
                            900: '#9E2D18',
                        },
                        merah: {
                            50:  '#FFF1F1',
                            100: '#FFDCDC',
                            200: '#FFB8B8',
                            300: '#FF8888',
                            400: '#FF6E6E',
                            500: '#FF5555',   // warna utama
                            600: '#E63E3E',
                            700: '#C22E2E',
                            800: '#9E2020',
                            900: '#7A1414',
                        },
                        cream: { 50:'#FDFCF8', 100:'#FAF7F0', 200:'#F5EFE0' },
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    borderRadius: {
                        '2xl': '1rem',
                        '3xl': '1.5rem',
                    }
                }
            }
        }
    </script>

    @livewireStyles

    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #F6FAF0; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { transform: translateY(100%); opacity: 0; }
            to   { transform: translateY(0); opacity: 1; }
        }
        @keyframes spinSlow { to { transform: rotate(360deg); } }

        .fade-up   { animation: fadeUp 0.35s ease-out forwards; }
        .slide-up  { animation: slideUp 0.3s ease-out forwards; }
        .spin-slow { animation: spinSlow 1s linear infinite; }

        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #F4FAEE; }
        ::-webkit-scrollbar-thumb { background: #C1E59F; border-radius: 4px; }

        input:focus, select:focus, textarea:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(163,215,138,0.25);
            border-color: #A3D78A !important;
        }

        .btn-pilih-aktif {
            background: #EBF6DE;
            border: 1.5px solid #A3D78A !important;
            color: #589140;
        }
        .btn-pilih-aktif span { font-weight: 600; }

        .badge-baik   { background:#EBF7DC; color:#589140; border:1px solid #C1E59F; }
        .badge-kurang { background:#FFF0EC; color:#C23F26; border:1px solid #FFC7BB; }
        .badge-buruk  { background:#FFEBEB; color:#C22E2E; border:1px solid #FF8888; }
        .badge-lebih  { background:#FFF3F0; color:#C23F26; border:1px solid #FFA997; }

        .text-primary-green { color: #C1E59F; }
        .text-primary-green-dark { color: #A3D78A; }
        .text-primary-red { color: #FF5555; }
        .text-primary-peach { color: #FF937E; }

        .bg-primary-green { background-color: #C1E59F; }
        .bg-primary-green-dark { background-color: #A3D78A; }
        .bg-primary-red { background-color: #FF5555; }
        .bg-primary-peach { background-color: #FF937E; }

        .border-primary-green { border-color: #C1E59F; }
        .border-primary-green-dark { border-color: #A3D78A; }
        .border-primary-red { border-color: #FF5555; }
        .border-primary-peach { border-color: #FF937E; }

        .hover\:bg-primary-green:hover { background-color: #C1E59F; }
        .hover\:bg-primary-green-dark:hover { background-color: #A3D78A; }
        .hover\:bg-primary-red:hover { background-color: #FF5555; }
        .hover\:bg-primary-peach:hover { background-color: #FF937E; }

        .hover\:border-primary-green:hover { border-color: #C1E59F; }
        .hover\:border-primary-green-dark:hover { border-color: #A3D78A; }
        .hover\:border-primary-red:hover { border-color: #FF5555; }
        .hover\:border-primary-peach:hover { border-color: #FF937E; }

        .hover\:text-primary-green:hover { color: #C1E59F; }
        .hover\:text-primary-green-dark:hover { color: #A3D78A; }
        .hover\:text-primary-red:hover { color: #FF5555; }
        .hover\:text-primary-peach:hover { color: #FF937E; }
    </style>
</head>
<body class="min-h-screen antialiased">

    {{-- ── NAVBAR ── --}}
    <header class="bg-white border-b border-[#C1E59F] sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-14 flex items-center justify-between">
            {{-- Brand --}}
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-[#A3D78A] rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3C8 3 5 7 5 11c0 4 2 6 4 7.5M12 3c4 0 7 4 7 8 0 4-2 6-4 7.5M12 3v18"/>
                    </svg>
                </div>
                <div>
                    <span class="font-semibold text-[#589140] text-sm leading-none">ItsSumi</span>
                    <p class="text-[#A3D78A] text-xs leading-none mt-0.5 hidden sm:block">Rekomendasi menu gizi balita</p>
                </div>
            </div>

            {{-- Badge kanan --}}
            <div class="flex items-center gap-2">
                <span class="text-xs bg-[#EBF6DE] text-[#589140] border border-[#C1E59F] px-3 py-1 rounded-full font-medium hidden sm:inline">
                    Standar Kemenkes RI
                </span>
                <span class="text-xs bg-[#FFF3F0] text-[#C23F26] border border-[#FF937E] px-3 py-1 rounded-full font-medium hidden sm:inline">
                    WHO Growth Standards
                </span>
            </div>
        </div>
    </header>

    {{-- ── KONTEN UTAMA ── --}}
    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-6 pb-16">
        {{ $slot }}
    </main>

    {{-- ── FOOTER ── --}}
    <footer class="bg-white border-t border-[#C1E59F] py-5 text-center">
        <p class="text-[#589140] text-xs font-medium">ItsSumi © {{ date('Y') }}</p>
        <p class="text-gray-400 text-xs mt-1">
            Rekomendasi bersifat informatif — bukan pengganti saran dokter atau ahli gizi.
        </p>
    </footer>

    @livewireScripts
</body>
</html>