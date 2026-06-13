# RR Gems Enterprise E-Commerce — Installation Guide

## Requirements

- PHP 8.2+ with extensions: `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `fileinfo`, `intl` (recommended)
- Composer 2.x
- Node.js 18+ and npm
- MySQL 8.0+

## Quick Start

```bash
# 1. Clone / open project
cd rrgemsudaipur

# 2. Environment
cp .env.example .env
php artisan key:generate

# 3. Configure MySQL in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rrgems_ecommerce
DB_USERNAME=root
DB_PASSWORD=

# 4. Install dependencies
composer install --ignore-platform-req=ext-intl
npm install

# 5. Storage link
php artisan storage:link

# 6. Migrate & seed
php artisan migrate:fresh --seed

# 7. Build assets
npm run build

# 8. Run server
php artisan serve
```

## Default Admin Login

| Field | Value |
|-------|-------|
| Email | `admin@rrgemsudaipur.com` |
| Password | `password` |

Admin panel: `http://127.0.0.1:8000/admin`

## Authentication Stack

This project uses **Laravel Jetstream (Livewire)** with **Fortify** for authentication, which provides everything Laravel Breeze offers plus:

- Two-factor authentication (2FA)
- API tokens (Sanctum)
- Profile management
- Session management

Customer registration/login uses the same stack at `/register` and `/login`.

## Payment Gateway Configuration

Add to `.env`:

```env
RAZORPAY_KEY=
RAZORPAY_SECRET=
STRIPE_KEY=
STRIPE_SECRET=
PAYPAL_CLIENT_ID=
PAYPAL_SECRET=
UPI_VPA=rrgems@upi
```

## Optional: Enable PHP intl & zip (XAMPP)

Edit `C:\xampp\php\php.ini`:

```ini
extension=intl
extension=zip
```

Restart Apache and re-run `composer install` without ignore flags.

## Production Checklist

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

Set `APP_ENV=production`, `APP_DEBUG=false`, and configure queue worker for abandoned cart emails.
