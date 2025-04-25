<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data KRS</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
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
            border-bottom: 2px solid #800000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin-bottom: 20px;
            padding: 8px 15px;
            background-color: #800000;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        a:hover {
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
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th {
            background-color: #800000;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .highlight-blue {
            color: #3f51b5;
            font-weight: bold;
        }
        .highlight-pink {
            color: #e91e63;
            font-weight: bold;
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
        <h2>Data KRS</h2>
        <a href="tambah.php">Tambah Data KRS</a>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
            </tr>
            <?php
            $no = 1;
            $data = $koneksi->query("SELECT 
                krs.id, 
                mhs.nama AS nama_mhs, 
                mk.nama AS nama_mk,
                mk.jumlah_sks
                FROM krs 
                JOIN mahasiswa mhs ON krs.mahasiswa_npm = mhs.npm 
                JOIN matakuliah mk ON krs.matakuliah_kodemk = mk.kodemk
                ORDER BY mhs.nama ASC");

            while ($d = $data->fetch_assoc()) {
                echo "<tr>
                    <td>$no</td>
                    <td>$d[nama_mhs]</td>
                    <td>$d[nama_mk]</td>
                    <td><span class='highlight-pink'>$d[nama_mhs]</span> Mengambil Mata Kuliah <span class='highlight-blue'>$d[nama_mk]</span> ($d[jumlah_sks] SKS)</td>
                </tr>";
                $no++;
            }
            ?>
        </table>

        <div class="footer">
            <a href="../index.php" class="btn-kembali">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>