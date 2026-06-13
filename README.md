# RR Gems Udaipur — Enterprise E-Commerce Platform

Laravel 12 enterprise e-commerce for certified gemstones and jewelry, with a full admin panel and Bootstrap 5 storefront.

## Features

- **Admin Panel**: Dashboard (sales, orders, charts), products with variants, categories, brands, orders, inventory, coupons, shipping, reviews, blog, banners, CMS, SEO panel, roles & permissions
- **Storefront**: Shop, product detail, cart, checkout, wishlist, compare, order tracking, blog, brands, CMS pages
- **Payments**: Razorpay, Stripe, PayPal, COD, UPI (gateway service layer)
- **Security**: Spatie permissions, activity logs, login logs, 2FA (Jetstream)
- **Marketing**: Newsletter, abandoned carts, loyalty points, referrals (schema ready)
- **AI Tools**: Product description & SEO meta generators (extensible to OpenAI)

## Documentation

| Document | Description |
|----------|-------------|
| [docs/INSTALLATION.md](docs/INSTALLATION.md) | Setup & environment |
| [docs/ARCHITECTURE.md](docs/ARCHITECTURE.md) | Project structure & layers |
| [docs/DATABASE_ER.md](docs/DATABASE_ER.md) | ER diagram (Mermaid) |
| [docs/MODULE_FLOW.md](docs/MODULE_FLOW.md) | Module & order flow diagrams |
| [docs/ROUTES.md](docs/ROUTES.md) | Route reference |

## Quick Start

```bash
composer install --ignore-platform-req=ext-intl
cp .env.example .env
php artisan key:generate
# Configure MySQL in .env
php artisan migrate:fresh --seed
npm install && npm run build
php artisan serve
```

**Admin**: http://127.0.0.1:8000/admin — `admin@rrgemsudaipur.com` / `password`

## Stack

Laravel · Livewire 3 · Bootstrap 5 · MySQL · Jetstream Auth · Spatie Permission · DomPDF
