<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategori Surat >> Edit
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-6 md:p-8 border border-gray-200">

                <!-- Catatan -->
                <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-yellow-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-gray-700 font-medium">Perhatian</p>
                            <p class="text-sm text-gray-600 mt-1">
                                Anda sedang mengubah data kategori. Pastikan data sudah benar sebelum disimpan.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Edit Kategori -->
                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Nama Kategori -->
                    <div>
                        <label for="nama" class="block font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="bg-yellow-100 text-yellow-700 rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-2">1</span>
                            Nama Kategori
                        </label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $kategori->nama) }}" placeholder="Contoh: Surat Masuk"
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 px-4 py-2.5">
                        @error('nama') 
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Keterangan -->
                    <div>
                        <label for="keterangan" class="block font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="bg-yellow-100 text-yellow-700 rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-2">2</span>
                            Keterangan
                        </label>
                        <textarea name="keterangan" id="keterangan" rows="4" placeholder="Contoh: Untuk surat resmi masuk"
                                  class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 px-4 py-2.5">{{ old('keterangan', $kategori->keterangan) }}</textarea>
                        @error('keterangan') 
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 pt-6 mt-6"></div>

                    <!-- Tombol -->
                    <div class="flex justify-start gap-4 mt-6">
                        <!-- Tombol Kembali -->
                        <a href="{{ route('kategori.index') }}"
                           class="inline-flex items-center justify-center bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 font-medium shadow-md hover:shadow-lg transition-all duration-200">
                            Kembali
                        </a>

                        <!-- Tombol Update -->
                        <button type="submit"
                            class="inline-flex items-center justify-center bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 font-medium shadow-md hover:shadow-lg transition-all duration-200">
                            Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
