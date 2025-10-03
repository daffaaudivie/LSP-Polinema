<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            About
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-white to-gray-50 shadow-xl rounded-xl p-8 border border-gray-200">
                
                <!-- Judul -->
                <h3 class="text-2xl font-bold text-gray-900 mb-8 pb-3 border-b-2 border-blue-500">About</h3>

                <div class="flex items-start gap-8">
                    
                    <!-- Foto Profil -->
                    <div class="w-32 h-40 border-2 border-blue-500 rounded-lg shadow-lg flex items-center justify-center overflow-hidden transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('images/profile.png') }}" 
                             alt="Foto Profil" 
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Biodata -->
                    <div class="flex-1">
                        <p class="text-gray-700 font-semibold mb-4 text-lg">Aplikasi ini dibuat oleh:</p>
                        <div class="space-y-2">
                            <p class="text-gray-800 flex items-center">
                                <span class="inline-block w-24 font-medium text-gray-600">Nama</span> 
                                <span class="mr-2">:</span>
                                <span class="font-semibold text-gray-900">Muhammad Daffa Farrell Audyvie</span>
                            </p>
                            <p class="text-gray-800 flex items-center">
                                <span class="inline-block w-24 font-medium text-gray-600">Prodi</span> 
                                <span class="mr-2">:</span>
                                <span class="font-semibold text-gray-900">D4 Sistem Informasi Bisnis</span>
                            </p>
                            <p class="text-gray-800 flex items-center">
                                <span class="inline-block w-24 font-medium text-gray-600">NIM</span> 
                                <span class="mr-2">:</span>
                                <span class="font-semibold text-gray-900">2141762098</span>
                            </p>
                            <p class="text-gray-800 flex items-center">
                                <span class="inline-block w-24 font-medium text-gray-600">Tanggal</span> 
                                <span class="mr-2">:</span>
                                <span class="font-semibold text-gray-900">02 Oktober 2023</span>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>