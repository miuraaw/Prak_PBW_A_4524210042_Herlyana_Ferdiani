<?php
$hasil = null;
$pesan = '';
$a_val = '';
$b_val = '';
$op_val = '+';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mempertahankan nilai input agar tidak hilang setelah submit
    $a_val = $_POST['a'] ?? '';
    $b_val = $_POST['b'] ?? '';
    $op_val = $_POST['operator'] ?? '+';

    $a = (float) ($a_val ?: 0);
    $b = (float) ($b_val ?: 0);

    switch ($op_val) {
        case '+':
            $hasil = $a + $b;
            break;
        case '-':
            $hasil = $a - $b;
            break;
        case '*':
            $hasil = $a * $b;
            break;
        case '/':
            if ($b == 0) {
                $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;
        // ─── MODIFIKASI 1: TAMBAHAN OPERATOR BARU (MODULO & PANGKAT) ───
        case '%':
            if ($b == 0) {
                $pesan = 'Modulo dengan nol tidak diperbolehkan.';
            } else {
                $hasil = fmod($a, $b); // fmod digunakan agar mendukung angka desimal
            }
            break;
        case '^':
            $hasil = pow($a, $b);
            break;
        default:
            $pesan = 'Operator tidak valid.';
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kalkulator Gokil</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .calculator-card {
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
            text-align: center;
        }
        h1 {
            margin-bottom: 25px;
            color: #00adb5;
        }
        input, select, button {
            padding: 12px;
            margin: 5px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #333;
            background-color: #2d2d2d;
            color: #fff;
            outline: none;
        }
        input[type="number"] {
            width: 120px;
        }
        button {
            background-color: #00adb5;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.2s;
        }
        button:hover {
            background-color: #007a80;
        }
        .alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #cf6679;
            color: #000;
            border-radius: 5px;
            font-weight: bold;
        }
        .result {
            margin-top: 20px;
            font-size: 22px;
            color: #393e46;
            background-color: #eeeeee;
            padding: 15px;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="calculator-card">
        <h1>Kalkulator Gokil</h1>

        <form method="post" action="Kalkulator.php">
            <!-- Menampilkan kembali angka yang diinput sebelumnya -->
            <input type="number" step="any" name="a" value="<?= htmlspecialchars($a_val) ?>" required placeholder="Angka A">

            <select name="operator">
                <option value="+" <?= $op_val === '+' ? 'selected' : '' ?>>+</option>
                <option value="-" <?= $op_val === '-' ? 'selected' : '' ?>>-</option>
                <option value="*" <?= $op_val === '*' ? 'selected' : '' ?>>*</option>
                <option value="/" <?= $op_val === '/' ? 'selected' : '' ?>>/</option>
                <option value="%" <?= $op_val === '%' ? 'selected' : '' ?>>% (Modulo)</option>
                <option value="^" <?= $op_val === '^' ? 'selected' : '' ?>>^ (Pangkat)</option>
            </select>

            <input type="number" step="any" name="b" value="<?= htmlspecialchars($b_val) ?>" required placeholder="Angka B">

            <button type="submit">Hitung</button>
        </form>

        <?php if ($pesan): ?>
            <div class="alert"><?= htmlspecialchars($pesan) ?></div>
        <?php elseif ($hasil !== null): ?>
            <div class="result">Hasil: <?= htmlspecialchars((string) $hasil) ?></div>
        <?php endif; ?>
    </div>
</body>

</html>