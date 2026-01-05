<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - AksaraKu</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <!-- Navbar -->
    <nav class="sticky top-4 z-30 mx-auto max-w-6xl px-4 font-sans">
        <div class="navbar bg-base-100/50 backdrop-blur-md rounded-2xl border border-base-300 shadow-sm px-6">

            <!-- Navbar Start: Logo -->
            <div class="navbar-start">
                <a class="text-xl font-extrabold tracking-tight text-primary">
                    Aksara<span class="text-base-content">Ku.</span>
                </a>
            </div>

            <!-- Navbar End: Theme select + Auth Buttons -->
            <div class="navbar-end gap-3 flex items-center">

                <!-- Theme Selector -->
                <div class="hidden sm:block">
                    <select id="themeSelector" class="select select-accent select-sm">
                        <option selected disabled>Color scheme</option>
                        <option value="light">Light</option>
                        <option value="dark">Dark</option>
                        <option value="cupcake">Cupcake</option>
                        <option value="bumblebee">Bumblebee</option>
                        <option value="emerald">Emerald</option>
                        <option value="corporate">Corporate</option>
                        <option value="synthwave">Synthwave</option>
                        <option value="retro">Retro</option>
                        <option value="cyberpunk">Cyberpunk</option>
                        <option value="valentine">Valentine</option>
                        <option value="halloween">Halloween</option>
                        <option value="garden">Garden</option>
                        <option value="forest">Forest</option>
                        <option value="aqua">Aqua</option>
                        <option value="lofi">Lofi</option>
                        <option value="pastel">Pastel</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="wireframe">Wireframe</option>
                        <option value="black">Black</option>
                        <option value="luxury">Luxury</option>
                        <option value="dracula">Dracula</option>
                        <option value="cmyk">CMYK</option>
                        <option value="autumn">Autumn</option>
                        <option value="business">Business</option>
                        <option value="acid">Acid</option>
                        <option value="lemonade">Lemonade</option>
                        <option value="night">Night</option>
                        <option value="coffee">Coffee</option>
                        <option value="winter">Winter</option>
                    </select>
                </div>

                <!-- Auth Buttons -->
                <a href="#" class="btn btn-ghost btn-sm font-semibold">Masuk</a>
                <a href="#" class="btn btn-primary btn-sm rounded-xl px-5">Daftar</a>

            </div>
        </div>
    </nav>

    <main>
        <section class="relative pt-12 pb-24 px-4 bg-base-100">
            <div class="max-w-4xl mx-auto text-center">
                <div data-aos="fade-down" data-aos-duration="800"
                    class="inline-flex items-center gap-2 bg-primary/5 border border-primary/10 text-primary px-4 py-1 rounded-full text-sm font-semibold mb-6">
                    <span class="relative flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                    </span>
                    Selamat Datang!
                </div>

                <h1 class="max-w-6xl mx-auto px-4 text-5xl md:text-7xl font-[800] tracking-tight mb-5 leading-[1.1"
                    data-aos="fade-up" data-aos-duration="800">
                    Belajar <span class="text-primary">Aksara Incung</span> Kapan dan Dimana Saja.
                </h1>

                <div class="font-incung text-3xl md:text-4xl text-accent font-bold tracking-[0.2em] mb-5 animate-pulse"
                    data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    bLjrX akXsr
                    slmtX dtM
                </div>

                <p class="text-lg max-w-2xl mx-auto mb-10 leading-relaxed opacity-70 font-medium" data-aos="fade-up"
                    data-aos-duration="800" data-aos-delay="400">
                    Platform pembelajaran digital interaktif untuk mempelajari Aksara Incung sebagai warisan budaya
                    Kerinci, Jambi.
                </p>

                <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-duration="800"
                    data-aos-delay="600">
                    <a
                        class="btn btn-neutral btn-lg rounded-2xl px-8 shadow-xl shadow-primary/10 hover:scale-[1.02] active:scale-[0.98] transition-all">
                        Mulai Belajar Sekarang
                    </a>
                </div>
            </div>
        </section>
        <section
            class="max-w-6xl mx-auto px-4 py-12 bg-[var(--color-base-100)] text-[var(--color-base-content)] min-h-screen font-sans">

            <header class="text-center mb-12" data-aos="fade-down" data-aos-duration="800">
                <h1 class="text-4xl md:text-5xl font-black mb-4 tracking-tight">
                    Alih Aksara <span class="text-[var(--color-primary)] font-incung">alHL akXsr</span>
                </h1>
                <p class="text-lg text-[var(--color-base-content)] opacity-70 max-w-2xl mx-auto">
                    Fitur ini mengubah tulisan Latin menjadi Aksara Incung secara Real Time. Cukup ketik di kolom kiri,
                    hasil
                    konversi akan muncul di kolom kanan. Fitur ini masih dalam tahap pengembangan dan penyempurnaan.
                </p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start" data-aos="fade-up" data-aos-duration="800">

                {{-- SISI INPUT --}}
                <div
                    class="group relative bg-[var(--color-base-200)] border-b-4 border-[var(--color-base-300)] rounded-2xl p-6 transition-all hover:translate-y-[-2px] active:translate-y-[0px]">
                    <label class="block text-sm font-bold uppercase tracking-widest text-[var(--color-neutral)] mb-4">
                        Teks Latin
                    </label>
                    <textarea id="latin-input" placeholder="Ketik di sini..." oninput="convertToIncung()"
                        class="w-full bg-transparent text-2xl font-medium focus:outline-none min-h-[200px] resize-none placeholder:opacity-30"></textarea>
                    <div class="flex justify-between items-center mt-4">
                        <span
                            class="text-xs font-bold text-[var(--color-base-content)] opacity-50 uppercase">Input</span>
                        <button onclick="clearAll()"
                            class="p-2 hover:bg-[var(--color-base-300)] rounded-xl transition-colors"
                            title="Hapus Semua">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M3 6h18" />
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- SISI OUTPUT --}}
                <div
                    class="relative bg-[var(--color-primary)]/10 border-b-4 border-[var(--color-primary)]/10 rounded-2xl p-6 transition-all shadow-xl">
                    <label class="block text-sm font-bold uppercase tracking-widest text-[var(--color-primary)] mb-4">
                        Aksara Incung <span class="font-incung lowercase ml-2">akXsr aLCuM</span>
                    </label>

                    {{-- Menggunakan Textarea agar kompatibel dengan navigator.clipboard & .value di JS --}}
                    <textarea id="incung-output" readonly placeholder="hsLlX kunXprXsL..."
                        class="w-full bg-transparent border-none p-0 text-4xl md:text-5xl font-incung text-[var(--color-primary)] break-words leading-relaxed min-h-[200px] resize-none focus:outline-none overflow-auto rounded-box px-4"></textarea>

                    <div class="flex justify-end mt-4">
                        <button onclick="copyIncungText(this)"
                            class="bg-[var(--color-primary)] hover:bg-[var(--color-primary)]/90 text-[var(--color-primary-content)] font-bold py-3 px-6 rounded-2xl border-b-4 border-black/20 transition-all active:border-b-0 active:translate-y-[4px] flex items-center gap-2 uppercase text-sm tracking-wider">

                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                            </svg>

                            <span id="copy-btn-text">Salin</span>
                        </button>
                    </div>
                </div>

            </div>

            {{-- Kartu Info --}}
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-duration="800">
                <div
                    class="p-6 rounded-2xl border-2 border-[var(--color-base-200)] flex flex-col items-center text-center">
                    <div
                        class="w-16 h-16 bg-[var(--color-secondary)] text-[var(--color-secondary-content)] rounded-2xl flex items-center justify-center mb-4 font-incung text-3xl shadow-lg border-b-4 border-black/10">
                        a</div>
                    <h3 class="font-bold text-lg mb-2">lorem ipsum</h3>
                    <p class="text-sm opacity-70">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima
                        numquam
                        obcaecati sequi at.</p>
                </div>
                <div
                    class="p-6 rounded-2xl border-2 border-[var(--color-base-200)] flex flex-col items-center text-center">
                    <div
                        class="w-16 h-16 bg-[var(--color-accent)] text-[var(--color-accent-content)] rounded-2xl flex items-center justify-center mb-4 font-incung text-3xl shadow-lg border-b-4 border-black/10">
                        d</div>
                    <h3 class="font-bold text-lg mb-2">lorem ipsum</h3>
                    <p class="text-sm opacity-70">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima
                        numquam
                        obcaecati sequi at.</p>
                </div>
                <div
                    class="p-6 rounded-2xl border-2 border-[var(--color-base-200)] flex flex-col items-center text-center">
                    <div
                        class="w-16 h-16 bg-[var(--color-success)] text-[var(--color-success-content)] rounded-2xl flex items-center justify-center mb-4 font-incung text-3xl shadow-lg border-b-4 border-black/10">
                        c</div>
                    <h3 class="font-bold text-lg mb-2">lorem ipsum</h3>
                    <p class="text-sm opacity-70">TLorem ipsum dolor sit, amet consectetur adipisicing elit. Minima
                        numquam
                        obcaecati sequi at.</p>
                </div>
            </div>

            <footer class="mt-20 pt-8 border-t-2 border-[var(--color-base-200)] text-center">
                <p class="text-xs font-bold uppercase tracking-[0.2em] opacity-40">
                    Dibuat untuk memudahkan akses belajar Aksara Incung di media digital.
                </p>
            </footer>
        </section>
    </main>

    <footer class="font-sans footer footer-horizontal footer-center bg-primary text-primary-content p-10">
        <aside>
            <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                clip-rule="evenodd" class="inline-block fill-current">
                <path
                    d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z">
                </path>
            </svg>
            <p class="font-bold">
                ACME Industries Ltd.
                <br />
                Providing reliable tech since 1992
            </p>
            <p>Copyright © {new Date().getFullYear()} - All right reserved</p>
        </aside>
        <nav>
            <div class="grid grid-flow-col gap-4">
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg>
                </a>
            </div>
        </nav>
    </footer>

    <script src="{{asset ('js/alih_aksara.js')}}"></script>
    <script src="{{asset ('js/theme_change.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>