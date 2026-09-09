<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agenda Surat</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surat.masuk') }}">Surat Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surat.keluar') }}">Surat Keluar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('log.index') }}">Log Aktivitas</a>
                    </li>
                </ul>
                <span class="navbar-text text-white me-3">
                    Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})
                </span>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-secondary">Log Aktivitas</h2>
            <a href="{{ route('surat.index') }}" class="btn btn-sm btn-outline-primary">Kembali ke Agenda</a>
        </div>

        @if ($logs->isEmpty())
            <div class="alert alert-info">Belum ada log aktivitas.</div>
        @else
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Aktivitas</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $log->username }}</td>
                                        <td>{{ $log->aktivitas }}</td>
                                        <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

</body>
</html>
