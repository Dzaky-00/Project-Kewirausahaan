<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capcin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleee.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

</head>

<body style="  font-family: 'Poppins', sans-serif;">

    <!-- Navbar -->
    <header class="header">
        <div class="container-navbar">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <img src="logo.jpg" alt="Capcin Logo">
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="section hero" style="background-image: url('bannerr.jpg')">
        <div class="container">
            <button class="btn btn-primary" onclick="location.href='produk.php'">
                Beli Sekarang <ion-icon name="arrow-forward-outline"></ion-icon>
            </button>
        </div>
    </section>

    <!-- Birjon Section -->
    <section class="section kopi-kenangan">
        <div class="container d-flex align-items-center flex-wrap gap-4">
            <div class="image-col">
                <img src="capcin.png" alt="Kopi Kenangan Drinks" class="img-fluid rounded">
            </div>
            <div class="text-col">
                <h2 class="h3">Capchill</h2>
                <p>
                    Cappuccino Cincau adalah kombinasi unik antara rasa kopi yang lembut dan creamy dengan tekstur cincau hitam yang kenyal dan menyegarkan. Minuman ini menghadirkan sensasi berbeda di setiap tegukan—seolah kopi klasik diberi sentuhan kekinian yang playful namun tetap elegan.</p>
                <p>
                    Cocok untuk kamu yang ingin menikmati kopi dengan cara yang lebih seru, tanpa kehilangan cita rasa premium. Disajikan dingin dan nikmat, Cappuccino Cincau siap menemani aktivitasmu—dari nongkrong bareng teman sampai recharge di tengah kesibukan harian.
                </p>
            </div>
        </div>
    </section>

    <!-- Gallery Produk Section -->
    <section class="section gallery-produk py-5">
        <div class="container">
            <h2 class="text-center fw-bold fs-3 mb-4">Galeri Produk Kami</h2>
            <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="banner.jpg" alt="Produk 1" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="banner2.jpg" alt="Produk 2" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="banner3.jpg" alt="Produk 3" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="banner4.jpg" alt="Produk 4" class="img-fluid rounded shadow-sm">
                </div>
                <!-- Tambah gambar lainnya di sini sesuai kebutuhan -->
            </div>
        </div>
    </section>

    <!-- Review Section -->
    <section class="section review">
        <div class="container">
            <h2 class="h3 text-center mb-4">Tinggalkan Review Kamu</h2>

            <form id="reviewForm" class="mx-auto mb-5" style="max-width: 500px;">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Komentar</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4">Kirim Review</button>
                </div>
            </form>

            <div id="reviewsContainer">
                <h3 class="fs-5 mb-3 text-center">Komentar Terbaru</h3>

                <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-inner" id="carouselInner">
                        <!-- Slide komentar akan ditambahkan di sini -->
                    </div>

                    <!-- Navigasi -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Sebelumnya</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Berikutnya</span>
                    </button>
                </div>
            </div>
    </section>

    <script>
        const reviewForm = document.getElementById('reviewForm');
        const carouselInner = document.getElementById('carouselInner');
        let allReviews = [];

        function renderCarousel() {
            carouselInner.innerHTML = '';
            const reviewsPerSlide = 2;
            const slideCount = Math.ceil(allReviews.length / reviewsPerSlide);

            for (let i = 0; i < slideCount; i++) {
                const slide = document.createElement('div');
                slide.classList.add('carousel-item');
                if (i === 0) slide.classList.add('active');

                const row = document.createElement('div');
                row.classList.add('row', 'justify-content-center', 'gx-3');

                for (let j = i * reviewsPerSlide; j < (i + 1) * reviewsPerSlide && j < allReviews.length; j++) {
                    const {
                        name,
                        comment
                    } = allReviews[j];
                    const col = document.createElement('div');
                    col.classList.add('col-md-6', 'mb-3');

                    col.innerHTML = `
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-3">
                    <img src="https://img.icons8.com/color/48/000000/user.png" alt="User Icon" class="rounded-circle" width="48">
                    </div>
                    <div>
                    <h5 class="card-title mb-1">${name}</h5>
                    <p class="card-text mb-0">${comment}</p>
                    </div>
                </div>
                </div>
            </div>`;
                    row.appendChild(col);
                }

                slide.appendChild(row);
                carouselInner.appendChild(slide);
            }
        }

        // Ambil review saat halaman dimuat
        window.addEventListener('DOMContentLoaded', () => {
            fetch('ambil_review.php')
                .then(res => res.json())
                .then(data => {
                    allReviews = data;
                    renderCarousel();
                });
        });

        // Kirim review ke server
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('name').value.trim();
            const comment = document.getElementById('comment').value.trim();

            if (name && comment) {
                fetch('simpan_review.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            name,
                            comment
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            allReviews.unshift({
                                name,
                                comment
                            });
                            renderCarousel();
                            reviewForm.reset();
                        } else {
                            alert(data.message || 'Gagal mengirim review.');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Terjadi kesalahan.');
                    });
            }
        });
    </script>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
        <!-- Anggota Kelompok -->
        <div class="footer-section">
            <h5>Anggota Kelompok</h5>

            <!-- Foto Kelompok -->
            <div class="text-center mb-3">
                <img src="foto_kelompok.jpg" alt="Foto Kelompok" class="img-fluid rounded shadow" style="max-height: 200px; object-fit: cover;">
            </div>

            <!-- Daftar Nama -->
            <ul class="list-unstyled text-center">
                <li><strong>Abel Sutha</strong> – Desain UI</li>
                <li><strong>Pascalis Bima</strong> – Backend Developer</li>
                <li><strong>Chervino Rafael</strong> – Pengurus Laporan </li>
                <li><strong>Dzaky Fadlillah</strong> – Frontend Developer</li>
                <li><strong>Dilon Alif</strong> – Desain UI</li>
            </ul>
        </div>

            <!-- Lokasi -->
            <div class="footer-section">
                <h3>Lokasi Kita</h3>
                <iframe
                    class="footer-map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2757.426585984078!2d112.75138074546669!3d-7.295151030568061!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbb061172cab%3A0x5ae5adf1c3898f84!2sGg.%20X%20A%20No.10%2C%20Ngagelrejo%2C%20Kec.%20Wonokromo%2C%20Surabaya%2C%20Jawa%20Timur%2060245!5e0!3m2!1sid!2sid!4v1747896071746!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                </iframe>
            </div>
        </div>



        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; 2025 <a href="#">Capcin</a>. All Rights Reserved.</p>
        </div>
    </footer>

    <a href="https://wa.me/62859183993190" class="wa-float" target="_blank">
        <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp Chat" />
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>