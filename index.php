<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Form Input Siswa</h1>

        <?php
        // Inisialisasi variabel
        $name = "";
        $grade = "";
        $status = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari form
            $name = $_POST['name'] ?? ""; // Menggunakan null coalescing operator
            $grade = $_POST['grade'] ?? ""; // Menggunakan null coalescing operator

            // Tentukan status kelulusan
            if (is_numeric($grade) && $grade >= 0) {
                if ($grade >= 70) {
                    $status = 'Lulus';
                } else {
                    $status = 'Tidak Lulus';
                }
            } else {
                $status = 'Nilai tidak valid';
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Nama Siswa:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            <label for="grade">Nilai (0-100):</label>
            <input type="number" id="grade" name="grade" min="0" max="100"
                value="<?php echo htmlspecialchars($grade); ?>" required>
            <button type="submit">Kirim</button>
        </form>

        <?php if ($name && $grade !== ""): ?>
        <div class="result">
            <h2>Hasil:</h2>
            <p>Nama: <?php echo htmlspecialchars($name); ?></p>
            <p>Nilai: <?php echo htmlspecialchars($grade); ?></p>
            <p>Status: <?php echo $status; ?></p>
        </div>
        <?php endif; ?>
    </div>

</body>

</html>