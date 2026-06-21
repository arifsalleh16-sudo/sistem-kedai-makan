# Sistem Pengurusan Kedai Makan

Sistem Pengurusan Kedai Makan dibangunkan menggunakan Laravel untuk mengurus menu, kategori, jualan dan POS (Point of Sale).

## Teknologi Digunakan

- Laravel 12
- PHP 8
- MySQL
- Bootstrap 5
- Railway
- GitHub

## Ciri-Ciri Sistem

- Login & Register
- Dashboard Statistik
- Pengurusan Menu
- Pengurusan Kategori
- Rekod Jualan
- POS System
- Resit Jualan
- Laporan Pendapatan
- Menu Paling Laris

## Cara Install

```bash
git clone https://github.com/arifsalleh16-sudo/sistem-kedai-makan.git

cd sistem-kedai-makan

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate:fresh --seed

php artisan serve
```

## Akaun Demo

Email:

```text
admin@kedaimakan.com
```

Password:

```text
password123
```

## Live Demo

Railway:

https://sistem-kedai-makan-production.up.railway.app

## Dibangunkan Oleh

Mohamad Arif Bin Mohd Salleh