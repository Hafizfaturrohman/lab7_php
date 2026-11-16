<?php
/* ===== BAGIAN PEMROSESAN (dipisah dari tampilan) ===== */
$data  = null;
$error = [];
$old   = ["nama"=>"","nim"=>"","prodi"=>"","semester"=>"","email"=>""];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama          = trim($_POST["nama"] ?? "");
    $nim           = trim($_POST["nim"] ?? "");
    $prodi         = trim($_POST["prodi"] ?? "");
    $semesterInput = trim($_POST["semester"] ?? "");
    $email         = trim($_POST["email"] ?? "");
    $old = ["nama"=>$nama,"nim"=>$nim,"prodi"=>$prodi,"semester"=>$semesterInput,"email"=>$email];

    if ($nama === "")  $error[] = "Nama wajib diisi.";
    if ($nim === "")   $error[] = "NIM wajib diisi.";
    if ($prodi === "") $error[] = "Program studi wajib diisi.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1–14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, "UTF-8"); }
?>
<!-- ===== BAGIAN TAMPILAN ===== -->
<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><title>Mini Project</title>
<link rel="stylesheet" href="style.css"></head><body>
<nav><a href="index.php">&larr; Menu</a></nav>
<h1>Formulir Data Mahasiswa</h1>

<?php if ($error): ?>
 <div class="error"><strong>Terdapat kesalahan:</strong>
  <ul><?php foreach ($error as $msg): ?><li><?= e($msg) ?></li><?php endforeach; ?></ul>
 </div>
<?php endif; ?>

<?php if ($data): ?>
 <div class="ok"><h3>Data berhasil diterima</h3>
 <table>
  <tr><th>Nama</th><td><?= e($data["nama"]) ?></td></tr>
  <tr><th>NIM</th><td><?= e($data["nim"]) ?></td></tr>
  <tr><th>Program Studi</th><td><?= e($data["prodi"]) ?></td></tr>
  <tr><th>Semester</th><td><?= e($data["semester"]) ?></td></tr>
  <tr><th>Email</th><td><?= e($data["email"]) ?></td></tr>
 </table></div>
<?php endif; ?>

<form method="POST" action="">
 <label for="nama">Nama</label>
 <input id="nama" name="nama" value="<?= e($old["nama"]) ?>">
 <label for="nim">NIM</label>
 <input id="nim" name="nim" value="<?= e($old["nim"]) ?>">
 <label for="prodi">Program Studi</label>
 <input id="prodi" name="prodi" value="<?= e($old["prodi"]) ?>">
 <label for="semester">Semester (1–14)</label>
 <input id="semester" name="semester" type="number" min="1" max="14" value="<?= e($old["semester"]) ?>">
 <label for="email">Email</label>
 <input id="email" name="email" type="text" value="<?= e($old["email"]) ?>">
 <button type="submit">Kirim</button>
</form>
<p><small>Field email sengaja memakai <code>type="text"</code> agar validasi server dapat diuji dengan input salah.</small></p>
</body></html>
