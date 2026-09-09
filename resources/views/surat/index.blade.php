<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Agenda Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('landing') }}">
                <i class="bi bi-file-earmark-text me-2"></i>Agenda Surat Digital
            </a>
            <div class="ms-auto">
                <span class="text-light me-3">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-secondary">{{ $title ?? 'Buku Agenda Surat Digital' }}</h2>

            {{-- TUGAS SISWA: Isikan href dengan route() menuju halaman create --}}
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('surat.create') }}" class="btn btn-primary px-4 shadow-sm">+ Tambah Surat</a>
            @endif
        </div>

        {{-- TUGAS SISWA: Tampilkan Alert Sukses jika ada Session Flash Message dari Controller --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Jenis</th>
                                <th>Pengirim / Penerima</th>
                                <th>Perihal</th>
                                <th>Tanggal</th>
                                @if (Auth::user()->role === 'admin')
                                    <th class="text-center">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            {{-- TUGAS SISWA: Mulai perulangan @foreach dari controller di sini --}}
                            @foreach ($surats as $surat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $surat->nomor_surat }}</td>
                                <td>
                                    {{-- TUGAS SISWA: Gunakan @if untuk membedakan badge --}}
                                    {{-- Jika Masuk = bg-success, Jika Keluar = bg-primary --}}
                                    @if ($surat->jenis_surat == 'Masuk')
                                        <span class="badge bg-success">Masuk</span>
                                    @else
                                        <span class="badge bg-primary">Keluar</span>
                                    @endif
                                </td>
                                <td>{{ $surat->pengirim_penerima }}</td>
                                <td>{{ $surat->perihal }}</td>
                                <td>{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d-m-Y') }}</td>
                                @if (Auth::user()->role === 'admin')
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- TUGAS SISWA: Isikan href ke route edit lengkap dengan ID-nya --}}
                                            <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>

                                            {{-- TUGAS SISWA: Buat tag <form> untuk fungsi Delete dengan @csrf dan @method('DELETE') --}}
                                            <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus surat ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            {{-- TUGAS SISWA: Akhiri perulangan @endforeach di sini --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>