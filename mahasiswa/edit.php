<?php include '../db.php';
$npm = $_GET['npm'];
$data = $koneksi->query("SELECT * FROM mahasiswa WHERE npm='$npm'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
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
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border 0.3s;
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #800000;
            outline: none;
            box-shadow: 0 0 0 2px rgba(128, 0, 0, 0.1);
        }
        .btn-group {
            margin-top: 25px;
        }
        .btn-update {
            background-color: #800000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-update:hover {
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
        .npm-display {
            background-color: #f5eaea;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #800000;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        
        <div class="npm-display">
            NPM: <?= htmlspecialchars($data['npm']) ?>
        </div>
        
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select id="jurusan" name="jurusan" required>
                    <option value="Informatika" <?= $data['jurusan'] == 'Informatika' ? 'selected' : '' ?>>Informatika</option>
                    <option value="Sistem Informasi" <?= $data['jurusan'] == 'Sistem Informasi' ? 'selected' : '' ?>>Sistem Informasi</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" required><?= htmlspecialchars($data['alamat']) ?></textarea>
            </div>
            
            <div class="btn-group">
                <button type="submit" name="update" class="btn-update">Update</button>
                <a href="index.php" class="btn-kembali">Kembali</a>
            </div>
        </form>
        
        <?php
        if (isset($_POST['update'])) {
            $nama = $koneksi->real_escape_string($_POST['nama']);
            $jurusan = $koneksi->real_escape_string($_POST['jurusan']);
            $alamat = $koneksi->real_escape_string($_POST['alamat']);
            
            $sql = "UPDATE mahasiswa SET 
                    nama='$nama', jurusan='$jurusan', alamat='$alamat' 
                    WHERE npm='$npm'";
            
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