<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Arsip Surat >> Lihat
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                
                <!-- Detail Surat -->
                <div class="mb-4">
                    <p><strong>Nomor:</strong> {{ $surat->nomor }}</p>
                    <p><strong>Kategori:</strong> {{ $surat->kategori->nama }}</p>
                    <p><strong>Judul:</strong> {{ $surat->judul }}</p>
                    <p><strong>Waktu Unggah:</strong> {{ $surat->created_at->format('Y-m-d H:i') }}</p>
                </div>

                <!-- Embed PDF -->
                <div class="w-full h-[600px] border rounded-lg overflow-hidden">
                    <iframe src="{{ asset('storage/' . $surat->file) }}" class="w-full h-full" frameborder="0"></iframe>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-4 flex gap-3">
                    <a href="{{ route('surat.index') }}" 
                       class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                        &lt;&lt; Kembali
                    </a>

                    <a href="{{ route('surat.download', $surat->id) }}" 
                       class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Unduh
                    </a>

                    <a href="{{ route('surat.edit', $surat->id) }}" 
                       class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        Edit/Ganti File
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
