<?php
session_start(); // Mulai sesi untuk notifikasi
require_once 'barang.php';
require_once 'barangManager.php';

$barangManager = new BarangManager();

// Tambah Barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $barangManager->tambahBarang($nama, $harga, $stok);
    $_SESSION['message'] = "Barang berhasil ditambahkan!";
    header('Location: databarang.php');
    exit;
}

// Hapus Barang
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $barangManager->hapusBarang($id);
    $_SESSION['message'] = "Barang berhasil dihapus!";
    header('Location: databarang.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Barang</title>
    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styles */
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #ff99cc, #ff66b2);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        /* Button Kembali */
        .btn-back {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: white;
            background: linear-gradient(90deg, #ff66b2, #ff3385);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            transition: transform 0.2s, background 0.3s ease;
        }

        .btn-back:hover {
            background: linear-gradient(90deg, #ff3385, #ff005c);
            transform: scale(1.05);
        }

        /* Container Styles */
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
        }

        /* Heading Styles */
        h1 {
            text-align: center;
            color: #d63384;
            margin-bottom: 20px;
            font-size: 28px;
        }

        /* Notifikasi */
        .message {
            background-color: #ffe6f0;
            color: #d63384;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Form Styles */
        form {
            margin-bottom: 30px;
        }

        form div {
            margin-bottom: 15px;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        form input, form button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }

        form button {
            background: linear-gradient(90deg, #ff66b2, #ff3385);
            color: white;
            border: none;
            font-weight: bold;
            transition: transform 0.2s, background 0.3s ease;
        }

        form button:hover {
            background: linear-gradient(90deg, #ff3385, #ff005c);
            transform: translateY(-3px);
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 15px;
            text-align: center;
        }

        table th {
            background-color: #ffe6f0;
            color: #d63384;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #fff5f8;
        }

        table tr:hover {
            background-color: #ffebf0;
        }

        table td {
            border: 1px solid #f3c2d4;
        }

        /* Tombol Aksi */
        .btn-delete {
            background: #ff4d6b;
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: transform 0.2s, background 0.3s ease;
        }

        .btn-delete:hover {
            background: #d63384;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Tombol Kembali -->
    <a href="index.php" class="btn-back">Kembali ke Dashboard</a>

    <!-- Kontainer Utama -->
    <div class="container">
        <h1>Pencatatan Barang</h1>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div>
                <label for="nama">Nama Barang:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="harga">Harga Barang:</label>
                <input type="number" id="harga" name="harga" required>
            </div>
            <div>
                <label for="stok">Stok Barang:</label>
                <input type="number" id="stok" name="stok" required>
            </div>
            <button type="submit" name="tambah">Tambah Barang</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barangManager->getBarang() as $barang): ?> 
                    <tr>
                        <td><?= $barang['id'] ?></td>
                        <td><?= $barang['nama'] ?></td>
                        <td><?= $barang['harga'] ?></td>
                        <td><?= $barang['stok'] ?></td>
                        <td>
                            <a href="?hapus=<?= $barang['id'] ?>" class="btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
