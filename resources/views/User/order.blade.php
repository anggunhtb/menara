<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <!-- Masukkan tautan CSS Anda di sini -->
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #bdbdbd;
            padding: 20px;
        }

        .container {
            max-width: 350px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="meja"],
        input[type="pesanan"],
        button[type="submit"],
        button[type="button"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        button[type="submit"] {
            background-color: #28a745; /* hijau */
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        button[type="button"] {
            background-color: #007bff; /* biru */
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="button"]:hover {
            background-color: #0056b3;
        }

        .hapus-pesanan {
            background-color: #dc3545; /* merah */
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .hapus-pesanan:hover {
            background-color: #c82333;
        }
    </style></head>
<body>
    
<div class="container">
    <h1>Pemesanan</h1>
    <form action="/proses-pemesanan" method="POST">
        <!-- Token CSRF -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- Input untuk informasi pelanggan -->
        <label for="nama">Nama Pelanggan:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="nomor">Nomor Meja:</label><br>
        <input type="meja" name="meja" required><br><br>

        <!-- Input untuk pesanan -->
        <div id="pesanan-container">
            <div class="pesanan">
                <label for="pesanan">Nama pesanan:</label>
                <input type="text" name="pesanan[]" required>

                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlah[]" min="1" required>
                <!-- Tambahkan tombol hapus -->
                <button type="button" class="hapus-pesanan">Hapus</button>
            </div>
        </div>
        <br>

        <!-- Tombol tambah pesanan -->
        <button type="button" id="tambah-pesanan">Tambah Pesanan</button>
        <br>
        <br>
        <!-- Tombol Submit -->
        <button type="submit" name="submit" value="whatsapp">Kirim ke WhatsApp</button>
    </form>
</div>

<script>
    // Definisikan fungsi untuk menambahkan pesanan
    function tambahPesanan() {
        var container = document.getElementById('pesanan-container');
        var pesananDiv = document.createElement('div');
        pesananDiv.className = 'pesanan';

        var labelPesanan = document.createElement('label');
        labelPesanan.textContent = 'Nama pesanan:';
        var inputPesanan = document.createElement('input');
        inputPesanan.type = 'text';
        inputPesanan.name = 'pesanan[]';
        inputPesanan.required = true;

        var labelJumlah = document.createElement('label');
        labelJumlah.textContent = 'Jumlah:';
        var inputJumlah = document.createElement('input');
        inputJumlah.type = 'number';
        inputJumlah.name = 'jumlah[]';
        inputJumlah.min = '1';
        inputJumlah.required = true;

        // Tambahkan tombol hapus
        var hapusButton = document.createElement('button');
        hapusButton.type = 'button';
        hapusButton.className = 'hapus-pesanan';
        hapusButton.textContent = 'Hapus';

        pesananDiv.appendChild(labelPesanan);
        pesananDiv.appendChild(inputPesanan);
        pesananDiv.appendChild(labelJumlah);
        pesananDiv.appendChild(inputJumlah);
        pesananDiv.appendChild(hapusButton);

        container.appendChild(pesananDiv);
    }

    // Tambahkan event listener untuk tombol "Tambah Pesanan"
    document.getElementById('tambah-pesanan').addEventListener('click', tambahPesanan);

    // Tambahkan event listener untuk tombol hapus
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('hapus-pesanan')) {
            event.target.parentNode.remove();
        }
    });
</script>
</body>
</html>
