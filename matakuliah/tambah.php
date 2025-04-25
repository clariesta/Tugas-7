<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f3f3;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #800000;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #800000;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #800000;
            font-weight: 500;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border 0.3s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #800000;
            outline: none;
            box-shadow: 0 0 0 2px rgba(128, 0, 0, 0.1);
        }
        .btn-group {
            margin-top: 25px;
        }
        .btn-simpan {
            background-color: #800000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-simpan:hover {
            background-color: #600000;
        }
        .btn-kembali {
            display: inline-block;
            margin-left: 15px;
            color: #800000;
            text-decoration: none;
            padding: 9px 18px;
            border: 1px solid #800000;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .btn-kembali:hover {
            background-color: #f0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Mata Kuliah</h2>
        <form method="POST">
            <div class="form-group">
                <label for="kodemk">Kode Mata Kuliah</label>
                <input type="text" id="kodemk" name="kodemk" required maxlength="6">
            </div>
            
            <div class="form-group">
                <label for="nama">Nama Mata Kuliah</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-group">
                <label for="jumlah_sks">Jumlah SKS</label>
                <input type="number" id="jumlah_sks" name="jumlah_sks" required min="1" max="6">
            </div>
            
            <div class="btn-group">
                <button type="submit" name="simpan" class="btn-simpan">Simpan</button>
                <a href="index.php" class="btn-kembali">Kembali</a>
            </div>
        </form>
        
        <?php
        if (isset($_POST['simpan'])) {
            $kodemk = $koneksi->real_escape_string($_POST['kodemk']);
            $nama = $koneksi->real_escape_string($_POST['nama']);
            $jumlah_sks = $koneksi->real_escape_string($_POST['jumlah_sks']);
            
            $sql = "INSERT INTO matakuliah VALUES ('$kodemk', '$nama', '$jumlah_sks')";
            if ($koneksi->query($sql)) {
                header("Location: index.php");
                exit();
            } else {
                echo '<p style="color:#800000; margin-top:20px;">Error: ' . $koneksi->error . '</p>';
            }
        }
        ?>
    </div>
</body>
</html>