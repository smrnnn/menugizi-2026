<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ItsSumi — Sistem Rekomendasi Menu Gizi Balita berbasis standar Kemenkes">
    <title>ItsSumi — Rekomendasi Gizi Tepat, Sesuai Kebutuhan Tubuhmu.</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Warna baru dari permintaan
                        'primary-yellow': '#FFDE42',
                        'primary-blue-light': '#53CBF3',
                        'primary-blue': '#5478FF',
                        'primary-blue-dark': '#111FA2',

                        // Turunan warna kuning
                        kuning: {
                            50:  '#FFFDE8',
                            100: '#FFF9C4',
                            200: '#FFED8A',
                            300: '#FFDE42',
                            400: '#F5C800',
                            500: '#D9B000',
                            600: '#B89200',
                            700: '#967500',
                            800: '#755800',
                            900: '#543D00',
                        },
                        // Turunan biru muda
                        biru_muda: {
                            50:  '#F0FAFF',
                            100: '#D1F2FE',
                            200: '#A3E5FC',
                            300: '#53CBF3',
                            400: '#2BB8E8',
                            500: '#0FA0D0',
                            600: '#0A7FA8',
                            700: '#075F80',
                            800: '#044058',
                            900: '#022030',
                        },
                        // Turunan biru
                        biru: {
                            50:  '#EEF2FF',
                            100: '#D6DFFF',
                            200: '#ADBEFF',
                            300: '#5478FF',
                            400: '#3A5FEB',
                            500: '#2A4BC9',
                            600: '#1E3AA3',
                            700: '#142A7D',
                            800: '#0C1C57',
                            900: '#060E31',
                        },
                        // Turunan biru tua
                        biru_tua: {
                            50:  '#E8E9F5',
                            100: '#C5C7E6',
                            200: '#9497D0',
                            300: '#5B5FB5',
                            400: '#2A2F99',
                            500: '#111FA2',
                            600: '#0E1A85',
                            700: '#0A1368',
                            800: '#070D4B',
                            900: '#04072E',
                        },
                        cream: { 50:'#FDFCF8', 100:'#FAF7F0', 200:'#F5EFE0' },
                    },
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    borderRadius: { '2xl': '1rem', '3xl': '1.5rem' },
                }
            }
        }
    </script>

    @livewireStyles

    <style>
        * { box-sizing: border-box; }
        html { font-size: clamp(15px, 0.85vw + 11px, 19px); }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #F0FAFF;
            line-height: 1.65;
            color: #111FA2;
        }

        @keyframes fadeUp { from{opacity:0;transform:translateY(14px);} to{opacity:1;transform:translateY(0);} }
        @keyframes slideUp { from{transform:translateY(100%);opacity:0;} to{transform:translateY(0);opacity:1;} }
        @keyframes spinSlow { to{transform:rotate(360deg);} }

        .fade-up  { animation: fadeUp 0.4s ease-out forwards; }
        .slide-up { animation: slideUp 0.3s ease-out forwards; }
        .spin-slow{ animation: spinSlow 1s linear infinite; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #F0FAFF; }
        ::-webkit-scrollbar-thumb { background: #53CBF3; border-radius: 8px; }

        input:focus, select:focus, textarea:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(83,203,243,0.25);
            border-color: #5478FF !important;
        }

        .badge-baik   { background:#EEF2FF; color:#111FA2; border-color:#5478FF; }
        .badge-kurang { background:#FFFDE8; color:#967500; border-color:#FFDE42; }
        .badge-buruk  { background:#FFE8E8; color:#8B0000; border-color:#FF6B6B; }
        .badge-lebih  { background:#FFFDE8; color:#967500; border-color:#FFDE42; }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .container-nutri {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            padding-left: clamp(1rem, 3vw, 4rem);
            padding-right: clamp(1rem, 3vw, 4rem);
        }
        @media (min-width: 640px) {
            .container-nutri { padding-left: 2rem; padding-right: 2rem; }
        }

        h1, h2, h3, h4, h5, h6 { line-height: 1.3; letter-spacing: -0.01em; }
        p { line-height: 1.75; }

        .card-hover { transition: all 0.2s ease; }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px -8px rgba(17,31,162,0.08);
        }

        input[type="text"], input[type="date"], input[type="number"] {
            font-size: 0.95rem;
        }

        /* Navbar active state fix */
        .nav-link {
            position: relative;
            transition: all 0.2s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: #5478FF;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .nav-link.active {
            color: #111FA2;
            font-weight: 700;
        }
    </style>
</head>
<body class="min-h-screen antialiased">

    {{-- ── NAVBAR ── --}}
    <header class="bg-white border-b border-[#53CBF3] sticky top-0 z-40 shadow-sm">
        <div class="container-nutri h-[4.5rem] flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
                <div class="w-10 h-10 bg-[#5478FF] rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3C8 3 5 7 5 11c0 4 2 6 4 7.5M12 3c4 0 7 4 7 8 0 4-2 6-4 7.5M12 3v18"/>
                    </svg>
                </div>
                <div>
                    <span class="font-bold text-[#111FA2] text-lg leading-none">ItsSumi</span>
                    <p class="text-[#111FA2] text-xs leading-none mt-1 hidden sm:block">Rekomendasi Gizi Tepat, Sesuai Kebutuhan Tubuhmu.</p>
                </div>
            </a>

            <nav class="flex items-center gap-2 sm:gap-5">
                <a href="{{ route('home') }}" 
                   class="nav-link text-sm {{ request()->routeIs('home') ? 'active text-[#111FA2]' : 'text-gray-400 hover:text-[#5478FF]' }} font-medium transition px-2 py-1">
                    Beranda
                </a>
                <a href="{{ route('about') }}" 
                   class="nav-link text-sm {{ request()->routeIs('about') ? 'active text-[#111FA2]' : 'text-gray-400 hover:text-[#5478FF]' }} font-medium transition px-2 py-1">
                    Tentang
                </a>
            </nav>
        </div>
    </header>

    <main class="container-nutri py-8 pb-20">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <footer class="bg-white border-t border-[#53CBF3] py-7 text-center">
        <div class="container-nutri">
            <p class="text-[#111FA2] text-sm font-semibold">ItsSumi</p>
            <p class="text-gray-400 text-sm mt-1.5 max-w-md mx-auto">
                Rekomendasi bersifat informatif — bukan pengganti saran dokter atau ahli gizi.
            </p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>