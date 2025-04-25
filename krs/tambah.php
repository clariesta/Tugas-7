<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db.php';

// Pastikan variabel koneksi konsisten (gunakan $koneksi)
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Proses form submission
if (isset($_POST['simpan'])) {
    $mahasiswa_npm = $koneksi->real_escape_string($_POST['mahasiswa_npm']);
    $matakuliah_kodemk = $koneksi->real_escape_string($_POST['matakuliah_kodemk']);
    
    if (empty($mahasiswa_npm) || empty($matakuliah_kodemk)) {
        echo "<script>alert('Semua field harus diisi!');</script>";
    } else {
        $query = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$mahasiswa_npm', '$matakuliah_kodemk')";
        
        if ($koneksi->query($query)) {
            echo "<script>
                alert('Data KRS berhasil ditambahkan!');
                window.location.href='index.php';
            </script>";
        } else {
            echo "<script>alert('Error: " . addslashes($koneksi->error) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data KRS</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f3f3;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h2 {
            color: #800000;
            border-bottom: 2px solid #800000;
            padding-bottom: 10px;
            margin-top: 0px
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: 500;
            color: #800000;
            margin-bottom: 8px;
        }
        select{
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        select {
            background-color: #fafafa;
        }
        select:focus {
            border-color: #800000;
            outline: none;
            box-shadow: 0 0 0 2px rgba(128,0,0,0.2);
        }
        .form-buttons {
            margin-top: 30px;
            display: flex;
            gap: 5px;
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
        <h2>Tambah Data KRS</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="mahasiswa_npm">Mahasiswa:</label>
                <select name="mahasiswa_npm" id="mahasiswa_npm" required>
                    <option value="">-- Pilih Mahasiswa --</option>
                    <?php
                    $query_mhs = "SELECT npm, nama FROM mahasiswa ORDER BY nama";
                    $result_mhs = $koneksi->query($query_mhs);
                    
                    if ($result_mhs && $result_mhs->num_rows > 0) {
                        while ($row = $result_mhs->fetch_assoc()) {
                            echo "<option value='".htmlspecialchars($row['npm'])."'>".
                                 htmlspecialchars($row['npm']." - ".$row['nama'])."</option>";
                        }
                    } else {
                        echo "<option value=''>-- Data mahasiswa tidak ditemukan --</option>";
                        if ($koneksi->error) {
                            echo "<!-- Error: ".htmlspecialchars($koneksi->error)." -->";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="matakuliah_kodemk">Mata Kuliah:</label>
                <select name="matakuliah_kodemk" id="matakuliah_kodemk" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    <?php
                    $query_mk = "SELECT kodemk, nama, jumlah_sks FROM matakuliah ORDER BY nama";
                    $result_mk = $koneksi->query($query_mk);
                    
                    if ($result_mk && $result_mk->num_rows > 0) {
                        while ($row = $result_mk->fetch_assoc()) {
                            echo "<option value='".htmlspecialchars($row['kodemk'])."'>".
                                 htmlspecialchars($row['nama']." (".$row['jumlah_sks']." SKS)")."</option>";
                        }
                    } else {
                        echo "<option value=''>-- Data mata kuliah tidak ditemukan --</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-buttons">
                <button type="submit" name="simpan" class="btn-simpan">Simpan</button>
                <a href="index.php" class="btn-kembali">Kembali</a>
            </div>

        </form>
    </div>
</body>
</html>