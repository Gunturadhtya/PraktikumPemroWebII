<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Peminjaman') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="mb-4 p-4 text-green-800 bg-green-100 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-fluid p-0 bg-dashboard">
        <div class="col-md-8 p-5">
            <div class="card border-0">
                <div class="card-body p-0">
                    <table class="w-full text-center border-collapse border border-black align-middle bg-white">
                        <thead>
                            <tr>
                                <th class="bg-[#9aa1ac] py-3 border border-black font-bold text-black">ID</th>
                                <th class="bg-[#9aa1ac] py-3 border border-black font-bold text-black">Nama Member</th>
                                <th class="bg-[#9aa1ac] py-3 border border-black font-bold text-black">Judul Buku</th>
                                <th class="bg-[#9aa1ac] py-3 border border-black font-bold text-black">Tgl Pinjam</th>
                                <th class="bg-[#9aa1ac] py-3 border border-black font-bold text-black">Tgl Kembali</th>
                                <th class="bg-[#9aa1ac] py-3 border border-black font-bold text-black" colspan="2">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $row)
                            <tr class="hover:bg-gray-100 transition duration-150">
                                <td class="py-2 px-3 border border-black text-black">{{ $row->id_peminjaman }}</td>
                                <td class="py-2 px-3 border border-black text-black">{{ $row->member->nama_member ?? 'Member Dihapus' }}</td>
                                <td class="py-2 px-3 border border-black text-black">{{ $row->buku->judul_buku ?? 'Buku Dihapus' }}</td>
                                <td class="py-2 px-3 border border-black text-black">{{ $row->tgl_pinjam->format('Y-m-d') }}</td>
                                <td class="py-2 px-3 border border-black text-black">
                                    @if($row->tgl_kembali)
                                        {{ $row->tgl_kembali->format('Y-m-d') }}
                                    @else
                                        <span class="text-red-600 font-semibold text-sm">Belum Kembali</span>
                                    @endif
                                </td>
                                <td class="py-2 px-3 border border-black w-24">
                                    <form action="{{ route('peminjaman.destroy', $row->id_peminjaman) }}" method="POST" onsubmit="return confirm('Hapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-[#fb4645] text-white text-sm px-3 py-1 rounded hover:opacity-90">Hapus</button>
                                    </form>
                                </td>
                                <td class="py-2 px-3 border border-black w-24">
                                    <a href="{{ route('peminjaman.edit', $row->id_peminjaman) }}" class="inline-block bg-[#f9cd0e] text-black text-sm px-3 py-1 rounded hover:opacity-90">Ubah</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>