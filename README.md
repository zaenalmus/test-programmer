# Tes Programmer


Ini adalah repositori untuk proyek **Tes Programmer**.

## Deskripsi
Proyek ini merupakan aplikasi web yang dibangun menggunakan framework PHP Laravel dan database MySQL. Tujuannya adalah untuk mengambil data produk dari link API yang disediakan, menyimpan data tersebut ke dalam database, dan menampilkannya di web. Aplikasi ini juga dilengkapi dengan fitur tambah, edit, dan hapus data, termasuk validasi input dan konfirmasi penghapusan.

## Teknologi yang Digunakan
**Software:** Visual Studio Code (kode editor), XAMPP (database MySQL), Postman (untuk pengujian API), Google Chrome  
**Framework:** Laravel v9.19, Bootstrap  
**Bahasa Pemrograman:** PHP v8.0, HTML, CSS  
**Ekstensi PHP Aktif:** curl, fileinfo, gd, gettext, mbstring, exif, mysqli, openssl, pdo_mysql  
**Alat:** Composer v2.5.7, Git

## Persyaratan
- PC/Laptop
- Koneksi internet
- Web browser
- Terpasang Composer
- Terpasang PHP v8.0 & ekstensi PHP yang diperlukan
- Terpasang MySQL
- Terpasang Git
- Terminal (cmd, PowerShell, Git Bash)
- Kode editor

## Instalasi
1. Clone proyek dengan menjalankan perintah berikut di terminal:  
   `git clone https://github.com/zaenalmus/test-programmer.git`
2. Buka folder yang telah di-clone dan buka di kode editor.
3. Di terminal kode editor, jalankan perintah `composer install`.
4. Setelah instalasi selesai, jalankan perintah `php artisan key:generate`.
5. Salin file `.env.example` dan ubah namanya menjadi `.env`, atau jalankan perintah `copy .env.example .env`.
6. Jalankan perintah `php artisan migrate` dan tekan "y" kemudian enter untuk melakukan migrasi database.
7. Terakhir, jalankan perintah `php artisan serve` untuk memulai server Laravel.

## Penggunaan
1. Setelah menjalankan Laravel, masukkan tautan server lokal pada browser, misalnya: "http://127.0.0.1:8000", dan arahkan ke `/getApi` untuk mendapatkan data dari API.
2. Sebelum itu, perbarui username dan password untuk masuk dan mengambil data dari API.
3. Buka file `app/Http/Controllers/ProdukController.php` dan perbarui hal-hal berikut:
   - Username: 'tesprogrammer' + tanggal saat ini (hari, bulan, dua digit terakhir tahun) + waktu server  
     Contoh: 'tesprogrammer140623C09'
   - Password: 'bisacoding - Tanggal Sekarang - Bulan Sekarang - Dua Angka Terakhir Tahun Sekarang'  
     Contoh: 'bisacoding-14-06-23'
   - Atau Anda dapat mengunjungi tautan [https://recruitment.fastprint.co.id/tes/programmer](https://recruitment.fastprint.co.id/tes/programmer) untuk melihat username dan password.
4. Kembali ke browser dan arahkan kembali ke `http://127.0.0.1:8000/getApi` untuk melihat data dari API dan menggunakan fitur tambah, edit, dan hapus.

## Struktur Direktori Proyek
- `app`: Direktori yang berisi kode aplikasi termasuk model, controller, dan logika bisnis lainnya.
- `database`: Direktori yang berisi migrasi database.
- `public`: Direktori yang berisi file publik seperti gambar dan file JavaScript dan CSS.
- `resources`: Direktori yang berisi file tampilan (view) aplikasi seperti file Blade, CSS, dan JavaScript.
- `routes`: Direktori yang berisi file rute (route) aplikasi.

## Fitur-Fitur
- Tambah, Edit, Hapus Produk: Pengguna dapat menambahkan, mengedit, dan menghapus data produk. Input yang diperlukan dapat dimasukkan, kemudian klik tombol "Simpan" untuk tambah dan edit. Untuk hapus, cukup pilih data yang ingin dihapus, lalu konfirmasi penghapusan.

## Masalah Umum
- Cloning failed using an ssh key for authentication: Bisa diabaikan dengan menekan enter, sehingga proses cloning akan berjalan.
- SSL certificate: Pastikan telah menginstal ekstensi PHP yang diperlukan di file `php.ini`.
- Error saat menjalankan `php artisan serve`: Biasanya disebabkan oleh dependensi yang belum diunduh. Jalankan perintah `composer update` untuk mengatasinya.
- cURL error 6: Could not resolve host: Pastikan koneksi internet telah aktif.

## Referensi
- Dokumentasi Laravel: [https://laravel.com](https://laravel.com)
- Channel YouTube: [https://youtube.com/@sandhikagalihWPU](https://youtube.com/@sandhikagalihWPU)
- [https://youtu.be/JUMkbDhAFCw](https://youtu.be/JUMkbDhAFCw)
- [https://youtu.be/tv7tqf3AC7Y](https://youtu.be/tv7tqf3AC7Y)
- Template Bootstrap: NiceAdmin v2.5.0 [https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/](https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/)
