# bookingtempat — SI Warunk

Aplikasi web pemesanan meja untuk mencatat nama pemesan, nomor meja, waktu, dan tanggal kunjungan serta menampilkan daftar antrian. Antarmuka menggunakan nama **SI Warunk**.

> Dokumentasi disusun dari kode repository. Setup, alur booking, dan demo belum diuji secara runtime dalam pembaruan dokumentasi ini.

## Fitur yang tersedia di kode

- Registrasi, login, dan logout berbasis session; akun baru diberi role `user`.
- Form pemesanan meja dan penyimpanan ke tabel `pesanans`.
- Daftar seluruh pesanan beserta nama, meja, waktu, tanggal, dan kolom status.
- Penghapusan pesanan; tombol hapus ditampilkan untuk role `admin`.
- Halaman dashboard dan profil pengguna yang sedang login.
- Seeder role `admin` dan `user`.

## Stack

| Bagian | Implementasi |
| --- | --- |
| Backend | PHP `^7.3\|^8.0`, Laravel `^8.40` (lock: 8.49.2), Eloquent |
| Tampilan | Blade, Bootstrap, jQuery; Vue 2 tersedia dalam dependensi frontend |
| Build aset | Laravel Mix 6, Sass, npm |
| Database | MySQL sebagai konfigurasi bawaan `.env.example`; skema melalui migration |
| Role | Spatie Laravel Permission (lock: 4.2.0) |
| Pengujian | PHPUnit 9; test bawaan, belum mencakup alur booking |

Sumber: [composer.json](composer.json), [composer.lock](composer.lock), [package.json](package.json), dan [webpack.mix.js](webpack.mix.js). Versi Node.js/npm serta kombinasi runtime yang berhasil digunakan **membutuhkan input pemilik**.

## Setup lokal

Prasyarat: Git, PHP yang kompatibel dengan `composer.lock` beserta ekstensi Laravel/PDO MySQL, Composer, MySQL, dan Node.js/npm untuk build aset.

```bash
git clone https://github.com/Pandora012/bookingtempat.git
cd bookingtempat
composer install
cp .env.example .env
php artisan key:generate
```

Pada Windows, jika `cp` tidak tersedia, salin `.env.example` menjadi `.env` secara manual. Buat database MySQL kosong, lalu sesuaikan konfigurasi berikut di `.env` sebelum migration:

```dotenv
APP_NAME="SI Warunk"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookingtempat
DB_USERNAME=isi_username_lokal
DB_PASSWORD=isi_password_lokal
```

`bookingtempat` adalah contoh nama database lokal, bukan nama database yang diwajibkan kode.

```bash
php artisan migrate
php artisan db:seed --class=RoleSeeder
npm ci
npm run dev
php artisan serve
```

Buka <http://127.0.0.1:8000>, daftar melalui `/register`, lalu akses `/booking` dan `/antrian`. RoleSeeder perlu dijalankan sebelum registrasi karena controller menetapkan role `user`. Jalankan seeder ini sekali pada database baru; seeder memakai `Role::create`, sehingga pengulangan dapat menghasilkan konflik role.

Opsional: `php artisan db:seed` menjalankan RoleSeeder dan UserSeeder untuk membuat akun contoh admin/user. Gunakan pada database lokal baru sebagai alternatif perintah RoleSeeder di atas, bukan sesudahnya. UserSeeder memuat kredensial tetap; periksa [file seeder](database/seeders/UserSeeder.php) dan ubah kredensial sebelum digunakan di luar lingkungan lokal.

## Environment variable

Acuan lengkap: [.env.example](.env.example).

| Variabel | Kegunaan |
| --- | --- |
| `APP_NAME`, `APP_URL` | Nama aplikasi dan URL lokal |
| `APP_KEY` | Kunci aplikasi, diisi oleh `php artisan key:generate` |
| `APP_ENV`, `APP_DEBUG` | Mode lingkungan; contoh setup di atas untuk lokal |
| `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` | Koneksi database |
| `SESSION_DRIVER=file`, `SESSION_LIFETIME=120` | Penyimpanan session dan masa berlaku dalam menit |
| `CACHE_DRIVER=file`, `QUEUE_CONNECTION=sync` | Cache lokal dan eksekusi antrean sinkron bawaan |
| `MAIL_*` | Konfigurasi email untuk alur reset password; default MailHog belum membuktikan email dapat terkirim |

Contoh environment juga memuat Redis, AWS, dan Pusher; alur booking yang diperiksa tidak memanggil layanan tersebut. Jangan commit `.env` atau kredensial pribadi.

## Route dan API

Route utama dari [routes/web.php](routes/web.php); halaman booking, antrian, dashboard, dan profil dilindungi middleware `auth` di controller.

| Metode | Path | Fungsi / akses |
| --- | --- | --- |
| GET | `/` | Halaman awal |
| GET / POST | `/register`, `/login` | Form dan proses autentikasi melalui `Auth::routes()` |
| POST | `/logout` | Keluar dari session |
| GET | `/booking` | Form booking, wajib login |
| POST | `/booking` | Simpan booking, wajib login |
| GET | `/antrian` | Daftar seluruh pesanan, wajib login |
| DELETE | `/booking/delete/{id}` | Hapus pesanan, wajib login; pemeriksaan role backend belum ada |
| GET | `/dashboard`, `/akun`, `/home` | Dashboard, profil, dan halaman home; wajib login |
| GET | `/api/user` | Route bawaan dengan `auth:api`, mengembalikan pengguna terautentikasi |

`POST /booking` menerima field `nama`, `nomeja`, `waktu`, dan `tanggal`; jika berhasil, respons mengarahkan ke `/antrian`. Form web memakai session dan token CSRF, bukan API booking JSON.

[routes/api.php](routes/api.php) hanya memuat `GET /api/user`. Guard API memakai driver token, tetapi migration pengguna tidak menyediakan kolom `api_token` dan belum ada alur penerbitan token; endpoint ini belum dapat dianggap sebagai API siap pakai. Tidak ada route API booking. Lihat daftar route runtime setelah dependensi terpasang:

```bash
php artisan route:list
```

## Batasan implementasi

- Validasi backend booking hanya memeriksa keunikan `waktu`. Kolom tersebut juga unik di database secara global, sehingga jam yang sama ditolak meskipun meja atau tanggal berbeda.
- Petunjuk di form tentang pemesanan 30 menit sebelumnya dan jeda 60 menit belum diterapkan pada controller.
- Antrian mengambil seluruh pesanan tanpa filter pemilik. Tombol hapus dibatasi dengan `@role('admin')` di Blade, tetapi endpoint hapus hanya memeriksa login.
- Kolom status nullable dan tidak diisi saat booking dibuat; tampilan memiliki label Dipesan/Selesai, tetapi belum ada route untuk mengubah status.
- Edit/update booking belum diimplementasikan. Test yang tersedia masih test contoh, bukan bukti pengujian fitur.

Sumber perilaku: [PesananController](app/Http/Controllers/PesananController.php), [migration pesanan](database/migrations/2021_07_07_170600_create_pesanans_table.php), dan [view antrian](resources/views/metadata/antrianmeja.blade.php).

## Demo dan informasi yang membutuhkan input pemilik

- **Demo publik:** belum ada URL demo aplikasi yang dapat diverifikasi dari file yang diperiksa. Membutuhkan URL dan hasil pengecekan akses.
- **Screenshot:** membutuhkan tangkapan layar dari aplikasi yang berhasil dijalankan.
- **Validasi setup:** membutuhkan versi PHP, Composer, Node.js/npm, MySQL, dan hasil uji instalasi serta booking.
- **Konteks portofolio:** membutuhkan peran/kontribusi pemilik, konteks proyek, dan hasil yang dapat dibuktikan.
