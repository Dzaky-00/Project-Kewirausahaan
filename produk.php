<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pemesanan Cappuccino Cincau</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --radius: 12px;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      --transition: all 0.25s ease;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5;
      padding-top: 100px;
    }

    .header {
      background: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }

    .container-navbar {
      display: flex;
      align-items: center;
      padding: 15px 20px;
    }

    .logo img {
      height: 50px;
    }

    .form-container {
      background: white;
      max-width: 500px;
      margin: auto;
      padding: 30px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      animation: fadeIn 0.5s ease;
    }

    .label {
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
    }

    .options {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .option-btn {
      padding: 10px 16px;
      border: 1px solid #ccc;
      background-color: white;
      cursor: pointer;
      border-radius: var(--radius);
      flex: 1;
      text-align: center;
      min-width: 100px;
      transition: var(--transition);
      user-select: none;
    }

    .option-btn:hover {
      transform: scale(1.05);
      box-shadow: var(--shadow);
    }

    .option-btn.active {
      background-color: #e0e0e0;
      border-color: #999;
    }

    .total-harga {
      font-size: 18px;
      font-weight: bold;
      margin: 20px 0;
      text-align: center;
    }

    button {
      background-color: #25D366;
      color: white;
      border: none;
      border-radius: var(--radius);
      padding: 14px;
      width: 100%;
      font-size: 16px;
      transition: var(--transition);
    }

    button:hover {
      background-color: #1DA851;
      transform: scale(1.02);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <header class="header">
    <div class="container-navbar">
      <a href="index.php" class="logo">
        <img src="logo.jpg" alt="Capcin Logo">
      </a>
    </div>
  </header>

  <!-- Form -->
  <div class="form-container">
    <h2 class="text-center">Pemesanan</h2>

    <div class="text-center mb-4">
      <img src="banner.jpg" alt="Banner" class="img-fluid" style="max-width: 300px;">
    </div>

    <div class="mb-3">
      <label class="label">Pilih Ukuran (ml):</label>
      <div class="options" id="ml-options">
        <div class="option-btn" data-value="250ml" data-price="3000">250ml</div>
        <div class="option-btn" data-value="500ml" data-price="7000">500ml</div>
        <div class="option-btn" data-value="1000ml" data-price="10000">1000ml</div>
      </div>
    </div>

    <div class="mb-3">
      <label class="label">Jumlah Barang:</label>
      <input type="number" id="jumlah" class="form-control" placeholder="Contoh: 2" min="1">
    </div>

    <div class="mb-3">
      <label class="label">Alamat Pengiriman:</label>
      <textarea id="alamat" class="form-control" rows="3" placeholder="Tulis alamat lengkap..."></textarea>
    </div>

    <div class="mb-3">
      <label class="label">Metode Pembayaran:</label>
      <div class="options" id="payment-options">
        <div class="option-btn" data-value="Transfer Bank">Transfer Bank</div>
        <div class="option-btn" data-value="COD">COD</div>
        <div class="option-btn" data-value="QRIS">QRIS</div>
      </div>
    </div>

    <div class="total-harga" id="total-harga">Total Harga: Rp 0</div>

    <button onclick="kirimPesan()">Pesan via WhatsApp</button>
  </div>

  <script>
    function setupToggle(groupId, callback) {
      const options = document.getElementById(groupId).children;
      for (const btn of options) {
        btn.addEventListener('click', () => {
          [...options].forEach(el => el.classList.remove('active'));
          btn.classList.add('active');
          if (callback) callback();
        });
      }
    }

    function updateTotal() {
      const jumlah = parseInt(document.getElementById('jumlah').value) || 0;
      const selectedSize = document.querySelector('#ml-options .active');
      const totalDiv = document.getElementById('total-harga');

      if (selectedSize && jumlah > 0) {
        const hargaPerItem = parseInt(selectedSize.dataset.price);
        const total = hargaPerItem * jumlah;
        totalDiv.textContent = `Total Harga: Rp ${total.toLocaleString('id-ID')}`;
      } else {
        totalDiv.textContent = 'Total Harga: Rp 0';
      }
    }

    function kirimPesan() {
      const size = document.querySelector('#ml-options .active');
      const ml = size?.dataset.value;
      const hargaPerItem = parseInt(size?.dataset.price);
      const jumlah = parseInt(document.getElementById('jumlah').value);
      const alamat = document.getElementById('alamat').value;
      const pembayaran = document.querySelector('#payment-options .active')?.dataset.value;

      if (!ml || !jumlah || !alamat || !pembayaran) {
        alert('Mohon lengkapi semua data terlebih dahulu.');
        return;
      }

      const total = hargaPerItem * jumlah;
      const pesan = `Halo, saya ingin memesan produk dengan detail berikut:` +
        `- Ukuran: ${ml}` +
        `- Jumlah: ${jumlah}` +
        `- Alamat: ${alamat}` +
        `- Metode Pembayaran: ${pembayaran}` +
        `- Total Harga: Rp ${total.toLocaleString('id-ID')}`;

      window.open(`https://wa.me/62859183993190?text=${encodeURIComponent(pesan)}`, '_blank');
    }

    document.getElementById('jumlah').addEventListener('input', updateTotal);
    setupToggle('ml-options', updateTotal);
    setupToggle('payment-options');
  </script>

</body>

</html>