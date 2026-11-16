# Jawaban Pertanyaan Evaluasi — Praktikum 7

1. **Client-side vs server-side.** Client-side dijalankan di browser pengguna (HTML, CSS, JavaScript) dan hasilnya langsung tampil di perangkat pengguna. Server-side dijalankan di server (PHP): server menerima request, memproses input/aturan aplikasi, lalu mengirim respons (biasanya HTML) ke browser. Browser tidak pernah menerima kode PHP mentah.

2. **Mengapa PHP harus lewat web server?** Karena kode PHP perlu diinterpretasikan oleh interpreter PHP yang dipanggil web server (Apache/Nginx). Jika dibuka dengan klik ganda (`file://`), tidak ada yang mengeksekusi PHP sehingga browser hanya menampilkan kode sebagai teks.

3. **Fungsi tanda `$`.** Penanda awal nama variabel PHP, misalnya `$nama`. Dengan tanda ini PHP membedakan variabel dari keyword, nama fungsi, dan konstanta.

4. **GET vs POST.** GET mengirim data lewat parameter URL (terlihat, tersimpan di riwayat, ada batas panjang), cocok untuk permintaan yang tidak mengubah data seperti pencarian. POST mengirim data pada body request, tidak tampil di URL, lazim untuk submit form yang mengubah data. POST bukan enkripsi; tetap gunakan HTTPS.

5. **Mengapa validasi di sisi server?** Validasi client-side (misal atribut `required`) mudah dilewati: pengguna bisa mematikan JavaScript, mengubah HTML lewat DevTools, atau mengirim request langsung (curl/Postman). Server adalah satu-satunya pemeriksa yang dapat dipercaya untuk menjaga kebenaran dan keamanan data.

6. **Fungsi `htmlspecialchars()`.** Mengubah karakter khusus HTML (`<`, `>`, `&`, `"`, `'`) menjadi entitas aman sehingga input pengguna tampil sebagai teks biasa, bukan dieksekusi sebagai HTML/script. Ini mengurangi risiko XSS.

7. **Manfaat function.** Kode dapat dipakai ulang tanpa menulis ulang, program lebih rapi dan mudah dibaca, perbaikan cukup di satu tempat, pengujian lebih mudah, dan logika dapat dipisah dari tampilan.
