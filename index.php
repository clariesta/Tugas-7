<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beranda</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f1e6e6, #e5d1d1); /* Slightly adjusted gradient */
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      backdrop-filter: blur(18px);
      background: rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 50px 40px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      animation: fadeIn 0.9s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(25px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h1 {
      font-size: 28px;
      font-weight: 600;
      color: #800000; /* Maroon */
      margin-bottom: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .menu-container {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .menu-item {
      display: flex;
      align-items: center;
      gap: 15px;
      text-decoration: none;
      background: rgba(255, 255, 255, 0.6); /* Slightly more opaque */
      padding: 18px 20px;
      border-radius: 12px;
      color: #800000; /* Maroon */
      font-weight: 500;
      transition: all 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.5); /* More defined border */
      box-shadow: 0 6px 20px rgba(128, 0, 0, 0.1);
    }

    .menu-item:hover {
      transform: translateY(-3px);
      background: rgba(255, 255, 255, 0.8); /* Slightly more visible hover */
      box-shadow: 0 8px 25px rgba(128, 0, 0, 0.2);
    }

    .menu-item i {
      font-size: 1.3rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1><i class="bi bi-house-door-fill"></i> Beranda</h1>
    <div class="menu-container">
      <?php
        $menuItems = [
          ['label' => 'Data Mahasiswa', 'link' => 'mahasiswa/index.php', 'icon' => 'bi-person-lines-fill'],
          ['label' => 'Data Mata Kuliah', 'link' => 'matakuliah/index.php', 'icon' => 'bi-journal-bookmark-fill'],
          ['label' => 'Data KRS', 'link' => 'krs/index.php', 'icon' => 'bi-clipboard2-check-fill']
        ];
        
        foreach ($menuItems as $item) {
          echo '<a href="' . $item['link'] . '" class="menu-item">
                  <i class="bi ' . $item['icon'] . '"></i>' . $item['label'] . '
                </a>';
        }
      ?>
    </div>
  </div>
</body>
</html>
