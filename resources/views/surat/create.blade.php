<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Surat Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agenda Surat</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surat.masuk') }}">
                            Surat Masuk
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surat.keluar') }}">
                            Surat Keluar
                        </a>
                    </li>

                    <!-- TUGAS SISWA:
                    Sembunyikan link ini jika user yang login bukan admin -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('log.index') }}">
                            Log Aktivitas
                        </a>
                    </li>

                </ul>

                <span class="navbar-text text-white me-3">
                    Halo, {{ auth()->user()->name }}
                    ({{ auth()->user()->role }})
                </span>
            </div>
        </div>
    </nav>

    <div class="container mt-5" style="max-width: 700px;">
        <div class="mb-3">
            <!-- TUGAS SISWA: Isikan href untuk kembali ke halaman utama (index) -->
            <a href="{{ route('surat.index') }}" class="text-decoration-none">&larr; Kembali ke Agenda</a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white p-3">
                <h5 class="mb-0 fw-bold">Tambah Surat Masuk / Keluar</h5>
            </div>
            <div class="card-body p-4">
                
                <!-- Tampilkan error jika ada -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal menyimpan surat!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <!-- TUGAS SISWA: Atur action form ke route store dan isi method="POST" -->
                <!-- Jangan lupa tambahkan directive @csrf di dalam form -->
                <form action="{{ route('surat.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror" placeholder="Contoh: 02/SMK/2026" value="{{ old('nomor_surat') }}">
                            @error('nomor_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jenis Surat</label>
                            <select name="jenis_surat" class="form-select @error('jenis_surat') is-invalid @enderror">
                                <option value="">-- Pilih Jenis --</option>
                                <option value="Masuk" @if(old('jenis_surat') == 'Masuk') selected @endif>Surat Masuk</option>
                                <option value="Keluar" @if(old('jenis_surat') == 'Keluar') selected @endif>Surat Keluar</option>
                            </select>
                            @error('jenis_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pengirim / Penerima Tujuan</label>
                        <input type="text" name="pengirim_penerima" class="form-control @error('pengirim_penerima') is-invalid @enderror" placeholder="Nama Instansi / Perorangan" value="{{ old('pengirim_penerima') }}">
                        @error('pengirim_penerima')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Perihal</label>
                        <textarea name="perihal" class="form-control @error('perihal') is-invalid @enderror" rows="3" placeholder="Isi ringkas perihal surat...">{{ old('perihal') }}</textarea>
                        @error('perihal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tanggal Surat</label>
                        <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ old('tanggal_surat') }}">
                        @error('tanggal_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary p-2 fw-semibold">Simpan Catatan Surat</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>
