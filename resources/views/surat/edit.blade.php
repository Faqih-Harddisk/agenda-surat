<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Surat</title>
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
            <a href="{{ route('surat.index') }}" class="text-decoration-none">&larr; Batal dan Kembali</a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-warning text-white p-3">
                <h5 class="mb-0 fw-bold text-dark">Ubah Data Surat</h5>
            </div>
            <div class="card-body p-4">

                <!-- TUGAS SISWA: Atur action ke route update dengan parameter ID, method="POST" -->
                <!-- Jangan lupa tambahkan @csrf dan @method('PUT') di dalam form -->
                <form action="{{ route('surat.update', $surat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" value="{{ $surat->nomor_surat }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Jenis Surat</label>
                            <select name="jenis_surat" class="form-select">
                                <option value="Masuk" {{ $surat->jenis_surat == 'Masuk' ? 'selected' : '' }}>Surat Masuk</option>
                                <option value="Keluar" {{ $surat->jenis_surat == 'Keluar' ? 'selected' : '' }}>Surat Keluar</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pengirim / Penerima Tujuan</label>
                        <input type="text" name="pengirim_penerima" class="form-control" value="{{ $surat->pengirim_penerima }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Perihal</label>
                        <textarea name="perihal" class="form-control" rows="3">{{ $surat->perihal }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Tanggal Surat</label>
                        <input type="date" name="tanggal_surat" class="form-control" value="{{ $surat->tanggal_surat }}">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning p-2 fw-semibold text-dark">Perbarui Data Surat</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>