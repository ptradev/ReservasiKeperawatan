# 📌 SISTEM RESERVASI KEPERAWATAN

## 📖 Deskripsi Singkat

Aplikasi ini adalah sistem backend berbasis Laravel yang digunakan untuk mengelola data pasien, perawat, dan layanan kesehatan. Sistem ini mendukung proses pemesanan layanan serta pencatatan transaksi secara terstruktur.

Aplikasi dirancang menggunakan konsep RESTful API dan basis data relasional, sehingga mudah dikembangkan dan diintegrasikan dengan aplikasi frontend. Proyek ini cocok digunakan sebagai media pembelajaran, tugas akademik, atau prototype aplikasi layanan kesehatan.

---

## 🚀 Fitur Utama

- Autentikasi pengguna (Register, Login, Logout) menggunakan JWT
- Manajemen data pasien
- Manajemen data perawat
- Manajemen data layanan
- Manajemen data transaksi
- Pencatatan log aktivitas sistem

---

## ⚙️ Cara Menjalankan Sistem

### Clone Repository

```bash
git clone https://github.com/ptradev/ReservasiKeperawatan
cd nama-repository
```

### Install Dependency

```bash
composer install
```

### Konfigurasi Environtment

```bash
cp .env.example .env
php artisan key:generate
```

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reservasi
DB_USERNAME=root
DB_PASSWORD=
```

### Migrasi Database

```bash
php artisan migrate:fresh --seed
```

### Menjalankan Server

```bash
php artisan serve
```

## Informasi Akun Uji Coba

```json
{
  "email": "admin@mail.com",
  "password": "password123"
}
```

## Dokumentasi API

Link Akses : https://documenter.getpostman.com/view/51452937/2sBXVfjrwf
