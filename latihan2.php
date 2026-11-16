<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><title>Latihan 2</title>
<link rel="stylesheet" href="style.css"></head><body>
<nav><a href="index.php">&larr; Menu</a></nav>
<h1>Latihan 2 — Nilai Akhir &amp; Predikat</h1>
<?php
function predikat($n) {
    if ($n >= 85) return "A";
    elseif ($n >= 75) return "B";
    elseif ($n >= 60) return "C";
    return "D";
}

// Data utama (sesuai modul)
$nama = "Siti"; $tugas = 85; $uts = 78; $uas = 90;
$nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

echo "Nama: " . htmlspecialchars($nama) . "<br>";
echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
echo "Predikat: " . predikat($nilaiAkhir);

// Uji beberapa kombinasi nilai
$uji = [
    ["Budi", 100, 90, 95],
    ["Cici", 70, 75, 80],
    ["Dedi", 60, 55, 65],
    ["Eka",  40, 30, 50],
];
echo "<h3>Uji Kombinasi Nilai</h3><table><tr><th>Nama</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Akhir</th><th>Predikat</th></tr>";
foreach ($uji as [$n, $t, $u, $a]) {
    $akhir = $t * 0.30 + $u * 0.30 + $a * 0.40;
    echo "<tr><td>" . htmlspecialchars($n) . "</td><td>$t</td><td>$u</td><td>$a</td><td>" .
         number_format($akhir, 2) . "</td><td>" . predikat($akhir) . "</td></tr>";
}
echo "</table>";
?>
</body></html>
