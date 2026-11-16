# Lab7Web_PHP — Praktikum 7: Pemrograman Server-Side dengan PHP

**Mata kuliah:** Pemrograman Web  
**Nama / NIM:** _(Hafiz Faturrohman / 312210375)_

## Tujuan
Memahami pemrosesan server-side, sintaks PHP, variabel, percabangan, perulangan, function, serta pemrosesan form GET/POST dengan validasi dan sanitasi input.

## Perangkat
Laptop/PC, web browser, Visual Studio Code, PHP 8.x, XAMPP/Laragon (Apache).

## Cara Menjalankan
1. Jalankan Apache dari XAMPP/Laragon.
2. Salin folder `Lab7Web_PHP` ke `htdocs` (XAMPP) atau `www` (Laragon).
3. Buka `http://localhost/Lab7Web_PHP/` (jangan klik ganda file PHP).

Alternatif tanpa XAMPP: `php -S localhost:8000` di dalam folder ini, lalu buka `http://localhost:8000`.

## Struktur File
| File | Isi |
|---|---|
| `index.php` | Menu navigasi |
| `latihan1.php` | Menjalankan PHP, menampilkan waktu server |
| `latihan2.php` | Nilai akhir & predikat + uji beberapa kombinasi |
| `latihan3.php` | Array dan `foreach` (7 nama) |
| `latihan4.php` | Function diskon, luas, kelulusan |
| `latihan5.php` | Form GET |
| `latihan6.php` | Form POST |
| `latihan7.php` | Subtotal transaksi dengan validasi |
| `mini_project.php` | Formulir data mahasiswa |
| `eksperimen_mandiri.php` | 5 eksperimen mandiri |
| `jawaban_evaluasi.md` | Jawaban 7 pertanyaan evaluasi |
| `style.css` | Gaya tampilan |
| `screenshots/` | Tempat screenshot hasil |

## Ringkasan Hasil
- Semua latihan berjalan melalui server lokal dan output tampil sebagai HTML.
- Seluruh output dari input pengguna memakai `htmlspecialchars()`.
- Validasi dilakukan di server (PHP) walaupun HTML sudah punya `required`/`min`/`max`.
- Mini project memisahkan blok pemrosesan (atas) dari tampilan (bawah) dan menampilkan semua pesan error sekaligus.

## Kasus Uji Validasi
**Mini Project (input valid)**
1. Nama `Siti`, NIM `2024010001`, Prodi `Teknik Informatika`, Semester `3`, Email `siti@mail.com` → data ditampilkan.
2. Nama `Budi <b>`, NIM `2023020002`, Prodi `Sistem Informasi`, Semester `14`, Email `budi@kampus.ac.id` → tag `<b>` tampil sebagai teks (aman).

**Mini Project (input tidak valid)**
1. Semua kosong, semester `abc`, email `siti@` → muncul semua pesan error.
2. Semester `15` dan email `tanpa-at.com` → error "Semester harus berupa angka 1–14" dan "Format email tidak valid".

**Latihan 7:** valid → `Pensil`, 2500.50, 3. Tidak valid → jumlah `0`, jumlah `-2`, atau harga bukan angka → "Periksa kembali...".

## Screenshot
Simpan di folder `screenshots/` (latihan1.png … latihan7.png, mini_project_valid.png, mini_project_error.png, eksperimen.png), lalu tautkan di sini:

`![Latihan 1](screenshots/latihan1.png)`

## Jawaban Evaluasi
Lihat [`jawaban_evaluasi.md`](jawaban_evaluasi.md).
