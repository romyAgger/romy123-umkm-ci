# UMKM CRUD CodeIgniter 4

Proyek ini berisi implementasi CRUD sederhana untuk data UMKM menggunakan CodeIgniter 4.x.

## Fitur

- CRUD data Umkm (nama, alamat, tanggal lahir pemilik, jenis usaha, produk, foto)
- Pencarian & Pagination
- Upload foto ke folder `public/uploads/umkm`
- Flash notifikasi sukses
- Bootstrap 5

## Cara Instal

```bash
# 1. Clone repo / ekstrak ZIP
composer install
cp .env.example .env
php spark key:generate

# 2. Atur database di .env lalu jalankan
php spark migrate
php spark db:seed UmkmSeeder

# 3. Jalankan server lokal
php spark serve
```

## Struktur Utama

- `app/Controllers/Umkm.php`
- `app/Models/UmkmModel.php`
- `app/Views/umkm/*`
- `app/Database/Migrations/*`
- `app/Database/Seeds/UmkmSeeder.php`
- `public/uploads/umkm/` (untuk foto)

## Deploy

1. Push ke GitHub (contoh `https://github.com/romy123/umkm-ci`)
2. Pastikan server mendukung PHP ≥ 8.1
3. Jalankan `composer install --no-dev && php spark migrate --all --seed`
