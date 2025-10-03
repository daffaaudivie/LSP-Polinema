<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Arsip Surat
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">

                <!-- Deskripsi -->
                <div class="mb-6">
                    <p class="text-gray-600">
                        Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.
                        Klik <span class="font-semibold text-blue-600">"Lihat"</span> pada kolom aksi untuk menampilkan surat.
                    </p>
                </div>

                <!-- Form Search -->
                <form method="GET" action="{{ route('surat.index') }}" class="flex items-center mb-6">
                    <input type="text" name="search" placeholder="Cari surat..."
                        value="{{ request('search') }}"
                        class="w-full px-4 py-2 rounded-l-lg border border-gray-300 focus:ring focus:ring-blue-300 focus:outline-none">
                    <button type="submit"
                        class="px-6 py-2 bg-gray-800 text-white font-semibold rounded-r-lg hover:bg-gray-700">
                        Cari!
                    </button>
                </form>

                <!-- Tabel Surat -->
                <div class="overflow-x-auto border border-gray-300 rounded-lg">
                    <table class="w-full bg-white">
                        <thead class="bg-gray-100">
                            <tr class="text-gray-700 text-left">
                                <th class="py-3 px-4 border-b border-gray-300">Nomor Surat</th>
                                <th class="py-3 px-4 border-b border-gray-300">Kategori</th>
                                <th class="py-3 px-4 border-b border-gray-300">Judul</th>
                                <th class="py-3 px-4 border-b border-gray-300">Waktu Pengarsipan</th>
                                <th class="py-3 px-4 border-b border-gray-300 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($surat as $s)
                                <tr class="hover:bg-gray-50 border-b border-gray-200">
                                    <td class="py-3 px-4">{{ $s->nomor }}</td>
                                    <td class="py-3 px-4">{{ $s->kategori->nama }}</td>
                                    <td class="py-3 px-4">{{ $s->judul }}</td>
                                    <td class="py-3 px-4">{{ $s->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- Tombol Hapus -->
                                            <form id="delete-form-{{ $s->id }}" action="{{ route('surat.destroy', $s->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="showDeleteModal({{ $s->id }})"
                                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                                    Hapus
                                                </button>
                                            </form>

                                            <!-- Tombol Unduh -->
                                            <form action="{{ route('surat.download', $s->id) }}" method="GET">
                                                <button type="submit"
                                                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                                                    Unduh
                                                </button>
                                            </form>

                                            <!-- Tombol Lihat -->
                                            <form action="{{ route('surat.show', $s->id) }}" method="GET">
                                                <button type="submit"
                                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                                    Lihat >>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 px-4 text-center text-gray-500">
                                        Tidak ada surat ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Arsipkan Surat -->
                <div class="mt-6">
                    <a href="{{ route('surat.create') }}"
                       class="inline-block bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-700">
                        Arsipkan Surat
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h3>
            <p class="text-gray-600 mb-6">Apakah Anda ingin menghapus data ini?</p>
            <div class="flex justify-end gap-3">
                <button onclick="hideDeleteModal()" 
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">
                    Batal
                </button>
                <button onclick="confirmDelete()" 
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        let deleteFormId = null;

        function showDeleteModal(id) {
            deleteFormId = id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteFormId = null;
        }

        function confirmDelete() {
            if (deleteFormId) {
                document.getElementById('delete-form-' + deleteFormId).submit();
            }
        }

        // Tutup modal jika klik di luar modal
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideDeleteModal();
            }
        });
    </script>
</x-app-layout>