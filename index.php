<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Body Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ff99cc, #ff66b2); /* Gradasi pink */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            box-sizing: border-box;
        }

        /* Container Styles */
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            max-width: 650px;
            width: 80%;
            text-align: center;
            margin-top: -60px; /* Agar sedikit lebih naik */
        }

        .container h1 {
            font-size: 36px;
            margin-bottom: 40px;
            color: #d63384; /* Warna pink gelap */
            font-weight: 600;
        }

        .button-grid {
            display: flex;
            justify-content: space-around; /* Mengatur tombol ke kiri dan kanan */
            flex-wrap: wrap; /* Agar tombol responsif */
        }

        .button-grid a {
            padding: 15px 30px;
            text-decoration: none;
            color: white;
            background: linear-gradient(90deg, #ff66b2, #ff3385);
            border-radius: 25px;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            box-shadow: 0 6px 15px rgba(255, 0, 102, 0.3);
            transition: all 0.3s ease;
            margin: 10px;
            width: 180px; /* Ukuran tetap untuk tombol */
            text-align: center;
        }

        .button-grid a:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 0, 102, 0.4);
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 600px) {
            .button-grid {
                flex-direction: column;
            }

            .button-grid a {
                width: 100%; /* Tombol mengambil lebar penuh */
                margin: 10px 0; /* Jarak antar tombol */
            }

            .container {
                padding: 30px;
                margin-top: -40px;
            }

            .container h1 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang</h1>
        <div class="button-grid">
            <a href="databarang.php">Kelola Barang</a>
            <a href="datacustomer.php">Kelola Pelanggan</a>
        </div>
    </div>
</body>
</html>
