<?php
function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, "UTF-8"); }

// 1. Rata-rata tiga komponen nilai
function rataRata(array $nilai) {
    return count($nilai) ? array_sum($nilai) / count($nilai) : 0;
}

// 3. Format Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format((float)$angka, 0, ",", ".");
}

// 4. Validasi NIM: angka saja, tepat 10 digit (ketentuan saya)
function validasiNim($nim) {
    if (!ctype_digit($nim)) return "NIM hanya boleh berisi angka.";
    if (strlen($nim) !== 10) return "NIM harus tepat 10 digit.";
    return null;
}

$aksi = $_POST["aksi"] ?? "";
$hasil1 = $hasil4 = null; $err1 = $err4 = null;

if ($aksi === "rata") {
    $in = [$_POST["n1"] ?? "", $_POST["n2"] ?? "", $_POST["n3"] ?? ""];
    $valid = true;
    foreach ($in as $v) if (!is_numeric($v) || $v < 0 || $v > 100) $valid = false;
    if ($valid) $hasil1 = rataRata(array_map("floatval", $in));
    else $err1 = "Ketiga nilai harus angka 0–100.";
}
if ($aksi === "nim") {
    $nim = trim($_POST["nim"] ?? "");
    $err4 = validasiNim($nim);
    if (!$err4) $hasil4 = $nim;
}

// 2. Pencarian nama pada array (GET)
$data = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita", "Alif"];
$kata = trim($_GET["cari"] ?? "");
$ditemukan = [];
if ($kata !== "") {
    foreach ($data as $n) if (stripos($n, $kata) !== false) $ditemukan[] = $n;
}
?>
<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><title>Eksperimen Mandiri</title>
<link rel="stylesheet" href="style.css"></head><body>
<nav><a href="index.php">&larr; Menu</a></nav>
<h1>Eksperimen Mandiri</h1>

<h2>1. Rata-rata tiga nilai</h2>
<form method="POST">
 <input type="hidden" name="aksi" value="rata">
 <label>Nilai 1 <input name="n1" type="number" step="0.01" value="<?= e($_POST["n1"] ?? "") ?>"></label>
 <label>Nilai 2 <input name="n2" type="number" step="0.01" value="<?= e($_POST["n2"] ?? "") ?>"></label>
 <label>Nilai 3 <input name="n3" type="number" step="0.01" value="<?= e($_POST["n3"] ?? "") ?>"></label>
 <button type="submit">Hitung</button>
</form>
<?php if ($err1) echo "<p class='error'>" . e($err1) . "</p>";
      if ($hasil1 !== null) echo "<p class='ok'>Rata-rata: " . number_format($hasil1, 2) . "</p>"; ?>

<h2>2. Cari nama dari array (GET)</h2>
<p>Data: <?= e(implode(", ", $data)) ?></p>
<form method="GET">
 <label>Kata kunci <input name="cari" value="<?= e($kata) ?>"></label>
 <button type="submit">Cari</button>
</form>
<?php
if ($kata !== "") {
    if ($ditemukan) echo "<p class='ok'>Ditemukan: " . e(implode(", ", $ditemukan)) . "</p>";
    else echo "<p class='error'>Tidak ada nama yang cocok dengan &quot;" . e($kata) . "&quot;.</p>";
}
?>

<h2>3. Format Rupiah</h2>
<ul>
 <li>150000 &rarr; <?= formatRupiah(150000) ?></li>
 <li>2750500 &rarr; <?= formatRupiah(2750500) ?></li>
 <li>999 &rarr; <?= formatRupiah(999) ?></li>
</ul>

<h2>4. Validasi NIM (angka saja, 10 digit)</h2>
<form method="POST">
 <input type="hidden" name="aksi" value="nim">
 <label>NIM <input name="nim" value="<?= e($_POST["nim"] ?? "") ?>"></label>
 <button type="submit">Validasi</button>
</form>
<?php if ($err4) echo "<p class='error'>" . e($err4) . "</p>";
      if ($hasil4) echo "<p class='ok'>NIM " . e($hasil4) . " valid.</p>"; ?>

<h2>5. Tombol Reset vs pemrosesan ulang</h2>
<form method="POST" action="">
 <label>Contoh isian <input name="contoh" value="<?= e($_POST["contoh"] ?? "") ?>"></label>
 <button type="submit">Kirim ke server</button>
 <button type="reset">Reset</button>
</form>
<p><strong>Penjelasan:</strong> tombol <code>reset</code> bekerja di <em>browser</em> (client-side): ia hanya
mengembalikan isi field ke nilai awal HTML tanpa mengirim request ke server. Field di atas diisi ulang
oleh PHP dari <code>$_POST</code>, jadi setelah dikirim, Reset akan mengembalikan ke nilai awal
halaman yang dimuat (nilai hasil submit sebelumnya), bukan mengosongkan. Sebaliknya, tombol
<code>submit</code> mengirim request baru sehingga PHP dijalankan ulang di server dan halaman dirender ulang.</p>
</body></html>
