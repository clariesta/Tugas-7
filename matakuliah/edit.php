<?php include '../db.php';
$kodemk = $_GET['kodemk'];
$data = $koneksi->query("SELECT * FROM matakuliah WHERE kodemk='$kodemk'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f3f3;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #800000;
            margin-top: 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #800000;
        }
        .form-group {
            margin-bottom: 20px;
            
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #800000;
        }
        input[type="text"], 
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1b3b3;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="text"]:focus, 
        input[type="number"]:focus {
            outline: none;
            border-color: #800000;
            box-shadow: 0 0 0 2px rgba(128, 0, 0, 0.1);
        }
        .form-buttons {
            margin-top: 30px;
            display: flex;
            gap: 5px;
        }
        button {
            background-color: #800000;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #630000;
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
        <h2>Edit Mata Kuliah</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>">
            </div>
            <div class="form-group">
                <label for="jumlah_sks">SKS:</label>
                <input type="number" id="jumlah_sks" name="jumlah_sks" value="<?= htmlspecialchars($data['jumlah_sks']) ?>">
            </div>
            <div class="form-buttons">
                <button type="submit" name="simpan" class="btn-simpan">Simpan</button>
                <a href="index.php" class="btn-kembali">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['update'])) {
    // Escape user inputs for security
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $jumlah_sks = $koneksi->real_escape_string($_POST['jumlah_sks']);
    
    $koneksi->query("UPDATE matakuliah SET 
        nama='$nama', jumlah_sks='$jumlah_sks' 
        WHERE kodemk='$kodemk'");
    header("Location: index.php");
}
?>