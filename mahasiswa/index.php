<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f3f3;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h2 {
            color: #800000;
            margin-bottom: 20px;
            font-size: 28px;
            border-bottom: 2px solid #800000;
            padding-bottom: 10px;
        }
        .btn-tambah {
            display: inline-block;
            background-color: #800000;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }
        .btn-tambah:hover {
            background-color: #600000;
        }
        .btn-kembali {
            display: inline-block;
            background-color: #800000;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        .btn-kembali:hover {
            background-color: #600000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #800000;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f3f3;
        }
        tr:hover {
            background-color: #f0e0e0;
        }
        .aksi a {
            color: #800000;
            text-decoration: none;
            margin-right: 10px;
            padding: 5px 10px;
            border-radius: 3px;
            transition: all 0.3s;
        }
        .aksi a:hover {
            background-color: #800000;
            color: white;
        }
        .aksi a:last-child {
            margin-right: 0;
        }
        .footer {
            margin-top: 10px;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <a href="tambah.php" class="btn-tambah">Tambah Data</a>
        <table>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
            $data = $koneksi->query("SELECT * FROM mahasiswa");
            while ($d = $data->fetch_assoc()) {
                echo "<tr>
                    <td>$d[npm]</td>
                    <td>$d[nama]</td>
                    <td>$d[jurusan]</td>
                    <td>$d[alamat]</td>
                    <td class='aksi'>
                        <a href='edit.php?npm=$d[npm]'>Edit</a>
                        <a href='hapus.php?npm=$d[npm]' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                    </td>
                </tr>";
            }
            ?>
        </table>

        <div class="footer">
            <a href="../index.php" class="btn-kembali">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>