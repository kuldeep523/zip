# Enterprise E-Commerce Architecture

## Tech Stack

| Layer | Technology |
|-------|------------|
| Framework | Laravel 12 |
| UI (Admin + Store) | Livewire 3, Bootstrap 5 |
| Auth | Jetstream + Fortify + Sanctum |
| Database | MySQL |
| Permissions | Spatie Laravel Permission |
| Activity Logs | Spatie Activity Log |
| PDF Invoices | DomPDF |
| Assets | Vite |

## Directory Structure

```
app/
├── Enums/              # OrderStatus, ProductStatus, CouponType, etc.
├── Http/
│   ├── Controllers/
│   │   ├── Admin/      # Invoice, Sitemap
│   │   └── Api/V1/     # REST API
│   └── Middleware/     # EnsureUserIsAdmin
├── Livewire/
│   ├── Admin/          # Dashboard, CRUD modules
│   └── Storefront/     # Shop, Cart, Checkout, Blog, etc.
├── Models/             # Eloquent models + relationships
└── Services/
    ├── Ai/             # AI description & SEO generators
    ├── Inventory/      # Stock in/out
    └── Payment/        # Razorpay, Stripe, PayPal, COD, UPI

database/
├── migrations/         # Full enterprise schema
├── seeders/            # Roles, permissions, demo data
└── factories/

resources/views/
├── layouts/admin.blade.php
├── layouts/gem-theme.blade.php
├── livewire/admin/
└── livewire/storefront/

routes/
├── web.php             # Storefront
├── admin.php           # Admin panel (/admin)
└── api.php             # API v1
```

## Clean Architecture Layers

1. **Presentation**: Livewire components + Blade views
2. **Application**: Services (Inventory, Payment, AI)
3. **Domain**: Models, Enums, business rules on models
4. **Infrastructure**: Migrations, external gateways, PDF

## Security

- CSRF on all web forms (Laravel default)
- XSS: Blade `{{ }}` escaping; sanitize CMS HTML in production
- SQL injection: Eloquent / query builder only
- Spatie activity log on User model
- Login logs table (`login_logs`)
- 2FA via Jetstream Fortify

## Roles

| Role | Access |
|------|--------|
| Super Admin | Full access |
| Admin | Nearly full (no destructive deletes where restricted) |
| Manager | Products, orders, inventory, reviews |
| Staff | View products & orders |
| Customer | Storefront only |
