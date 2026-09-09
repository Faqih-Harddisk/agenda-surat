<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Surat Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            border-radius: 0 0 30px 30px;
        }

        .hero h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 1.1rem;
            opacity: 0.95;
            margin-bottom: 30px;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15) !important;
        }

        .card-icon {
            font-size: 3rem;
            color: #0d6efd;
            margin-bottom: 15px;
        }

        .card-title {
            color: #212529;
            font-size: 1.2rem;
        }

        .card-text {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Button Styling */
        .btn-primary {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 12px 35px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(13, 110, 253, 0.3);
        }

        .btn-light {
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-light:hover {
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #212529 0%, #0d6efd 100%);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Spacing */
        .section-padding {
            padding: 70px 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-5" href="{{ route('landing') }}">
                <i class="bi bi-file-earmark-text me-2"></i>Agenda Surat Digital
            </a>
            <a href="{{ route('login') }}" class="btn btn-light btn-sm px-3">
                <i class="bi bi-arrow-right me-1"></i>Masuk
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1><i class="bi bi-file-earmark-text me-2"></i>Sistem Manajemen Surat Digital</h1>
            <p>Kelola surat masuk dan keluar dengan mudah dan terorganisir</p>
            <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4">
                <i class="bi bi-arrow-right me-2"></i>Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Title Section -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">Fitur Utama</h2>
                <p class="text-muted fs-5">Semua yang Anda butuhkan untuk mengelola surat dengan efisien</p>
            </div>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="card-icon">
                                <i class="bi bi-file-earmark-plus"></i>
                            </div>
                            <h5 class="card-title fw-bold">Tambah Surat</h5>
                            <p class="card-text">Tambahkan surat masuk atau keluar dengan data lengkap dan detail</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="card-icon">
                                <i class="bi bi-table"></i>
                            </div>
                            <h5 class="card-title fw-bold">Lihat Semua Data</h5>
                            <p class="card-text">Tampilkan semua surat dalam bentuk tabel yang rapi dan mudah dibaca</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="card-icon">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                            <h5 class="card-title fw-bold">Edit Surat</h5>
                            <p class="card-text">Ubah atau perbarui informasi surat kapan saja sesuai kebutuhan</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center py-4">
                            <div class="card-icon">
                                <i class="bi bi-trash"></i>
                            </div>
                            <h5 class="card-title fw-bold">Hapus Surat</h5>
                            <p class="card-text">Hapus data surat yang sudah tidak diperlukan dengan aman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-file-earmark-text me-2"></i>Agenda Surat Digital
                    </h5>
                    <p class="text-light-50">Sistem manajemen surat yang memudahkan Anda mengelola dokumen penting dengan aman dan terorganisir.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-2">
                        <i class="bi bi-envelope me-2"></i>info@suratdigital.com
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-telephone me-2"></i>(021) 1234-5678
                    </p>
                    <p>
                        <i class="bi bi-geo-alt me-2"></i>Jakarta, Indonesia
                    </p>
                </div>
            </div>
            <hr class="bg-white bg-opacity-25 my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2026 Agenda Surat Digital. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>