<?php
// biodata.php
function statusKelulusan(float $ipk): string
{
    // ─── MODIFIKASI KEDUA: KONDISI BARU (PREDIKAT CUM LAUDE UNTUK IPK SEMPURNA) ───
    if ($ipk == 4.00) return 'Dengan Pujian (Cum Laude)';
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim' => '4524210042',
    'nama' => 'Herlyana ferdiani',
    'prodi' => 'Teknik Informatika',
    // MODIFIKASI PERTAMA: Field Baru (Sudah diperbaiki koma yang kurang di akhir baris)
    'Tempat & tanggal lahir' => 'Jakarta, 6 Juni 2006', 
    'semester' => 5,
    'ipk' => 4.00
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata</title>
</head>

<body>
    <h1>Biodata Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>
            <li><?= ucfirst($kunci) ?>: <?= htmlspecialchars((string)$nilai) ?></li>
        <?php endforeach; ?>
    </ul>

    <p>Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?></p>
</body>

</html>