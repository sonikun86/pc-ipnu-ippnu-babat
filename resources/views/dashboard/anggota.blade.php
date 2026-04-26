<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Informasi Organisasi</h3>
                    <p class="text-gray-600">Selamat datang di portal Khidmat. Anda dapat melihat struktur organisasi dan data anggota aktif lainnya di sini.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Struktur Organisasi</h3>
                    <div class="aspect-video bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                        <!-- Placeholder for Organization Structure Image/Chart -->
                        <p>Visualisasi Struktur Organisasi (TBA)</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Direktori Anggota Aktif</h3>
                    <ul class="divide-y divide-gray-200">
                        @forelse ($activeMembers as $member)
                            <li class="py-3 flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-900">{{ $member->name }}</span>
                                <span class="text-xs text-gray-500">{{ $member->address }}</span>
                            </li>
                        @empty
                            <li class="py-3 text-sm text-gray-500 text-center">Belum ada data anggota.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
