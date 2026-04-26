<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Khidmat - IPNU IPPNU Babat</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 text-gray-900">
        <nav class="bg-white shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <span class="text-2xl font-bold text-green-600">Khidmat</span>
                        <span class="ml-2 text-sm text-gray-500 hidden sm:block">PC IPNU IPPNU Babat</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-green-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-green-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white bg-green-600 px-4 py-2 rounded-md hover:bg-green-700 transition">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-green-600 py-20 text-white text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Selamat Datang di Khidmat</h1>
            <p class="text-xl opacity-90 max-w-2xl mx-auto px-4">Portal Informasi dan Administrasi Pimpinan Cabang IPNU IPPNU Babat.</p>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-8 border-b-2 border-green-500 pb-2 inline-block">Berita Terbaru</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($posts as $post)
                        <article class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                            <div class="h-48 bg-gray-200">
                                @if($post->image)
                                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
                                <p class="text-gray-600 line-clamp-3 mb-4 text-sm">{{ Str::limit($post->content, 120) }}</p>
                                <a href="#" class="text-green-600 font-semibold hover:underline">Baca Selengkapnya &rarr;</a>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-full text-center py-12 bg-white rounded-lg border-2 border-dashed border-gray-200">
                            <p class="text-gray-500 italic">Belum ada berita yang diterbitkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </main>

        <footer class="bg-white border-t border-gray-200 py-8">
            <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} PC IPNU IPPNU Babat. Powered by Khidmat.
            </div>
        </footer>
    </body>
</html>
