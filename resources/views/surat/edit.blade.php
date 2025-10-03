<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Arsip Surat >> Edit
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-6 md:p-8 border border-gray-200">

                <!-- Catatan -->
                <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-yellow-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-8 4a1 1 0 100 2 1 1 0 000-2zm1-7V5a1 1 0 10-2 0v2a1 1 0 001 1h1a1 1 0 100-2h-1z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-gray-700 font-medium">Informasi Penting</p>
                            <p class="text-sm text-gray-600 mt-1">
                                Anda dapat mengubah detail surat atau mengganti file PDF jika diperlukan.
                            </p>
                            <p class="text-sm text-red-600 font-semibold mt-1">⚠️ Catatan: Jika tidak mengganti file, biarkan kosong.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Edit Surat -->
                <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Nomor Surat -->
                    <div>
                        <label for="nomor" class="block font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="bg-yellow-100 text-yellow-700 rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-2">1</span>
                            Nomor Surat
                        </label>
                        <input type="text" name="nomor" id="nomor" value="{{ old('nomor', $surat->nomor) }}" 
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 px-4 py-2.5">
                        @error('nomor') 
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori_id" class="block font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="bg-yellow-100 text-yellow-700 rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-2">2</span>
                            Kategori
                        </label>
                        <select name="kategori_id" id="kategori_id"
                                class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 px-4 py-2.5 bg-white">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id', $surat->kategori_id) == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id') 
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="bg-yellow-100 text-yellow-700 rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-2">3</span>
                            Judul
                        </label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $surat->judul) }}" 
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 px-4 py-2.5">
                        @error('judul') 
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- File Surat -->
                    <div>
                        <label for="file" class="block font-semibold text-gray-700 mb-2 flex items-center">
                            <span class="bg-yellow-100 text-yellow-700 rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-2">4</span>
                            Ganti File Surat (PDF) (Opsional)
                        </label>
                        <input type="file" name="file" id="file" accept="application/pdf"
                               class="mt-1 w-full border-2 border-gray-300 rounded-lg px-3 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-white hover:file:bg-yellow-600 file:cursor-pointer cursor-pointer">
                        @if($surat->file)
                            <p class="text-sm text-gray-500 mt-2">File saat ini: 
                                <a href="{{ asset('storage/'.$surat->file) }}" target="_blank" class="text-blue-600 underline">Lihat PDF</a>
                            </p>
                        @endif
                        @error('file') 
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 pt-6 mt-6"></div>

                    <!-- Tombol -->
                    <div class="flex justify-start gap-4 mt-6">
                        <a href="{{ route('surat.show', $surat->id) }}"
                           class="inline-flex items-center justify-center bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 font-medium shadow-md">
                            Batal
                        </a>

                        <button type="submit"
                            class="inline-flex items-center justify-center bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 font-medium shadow-md">
                            Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
