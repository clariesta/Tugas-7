<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
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
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h2 {
            color: #800000;
            margin-bottom: 25px;
            font-size: 28px;
            border-bottom: 2px solid #800000;
            padding-bottom: 10px;
            margin-top: 10px;
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
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #800000;
            outline: none;
            box-shadow: 0 0 0 2px rgba(128, 0, 0, 0.1);
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        .btn-simpan {
            background-color: #800000;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 5px;
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
            padding: 11px 20px;
            border: 1px solid #800000;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .btn-kembali:hover {
            background-color: #f0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Mahasiswa</h2>
        <form method="POST">
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" id="npm" name="npm" required>
            </div>
            
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select id="jurusan" name="jurusan" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" required></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" name="simpan" class="btn-simpan">Simpan</button>
                <a href="index.php" class="btn-kembali">Kembali</a>
            </div>
        </form>
        
        <?php
        if (isset($_POST['simpan'])) {
            $npm = $koneksi->real_escape_string($_POST['npm']);
            $nama = $koneksi->real_escape_string($_POST['nama']);
            $jurusan = $koneksi->real_escape_string($_POST['jurusan']);
            $alamat = $koneksi->real_escape_string($_POST['alamat']);
            
            $sql = "INSERT INTO mahasiswa VALUES ('$npm', '$nama', '$jurusan', '$alamat')";
            if ($koneksi->query($sql)) {
                header("Location: index.php");
                exit();
            } else {
                echo "<p style='color:#800000; margin-top:20px;'>Error: " . $koneksi->error . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>