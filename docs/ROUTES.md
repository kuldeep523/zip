# Route Reference

## Storefront (`routes/web.php`)

| Method | URI | Name |
|--------|-----|------|
| GET | `/` | storefront.home |
| GET | `/shop` | storefront.shop |
| GET | `/product/{slug}` | storefront.product |
| GET | `/category/{slug}` | storefront.category |
| GET | `/brands` | storefront.brands |
| GET | `/blog` | storefront.blog |
| GET | `/cart` | storefront.cart |
| GET | `/checkout` | storefront.checkout |
| GET | `/order-tracking` | storefront.order-tracking |
| GET | `/compare` | storefront.compare |
| GET | `/wishlist` | storefront.wishlist (auth) |
| GET | `/page/{slug}` | storefront.page |
| GET | `/robots.txt` | robots |

## Admin (`routes/admin.php`)

| URI | Name |
|-----|------|
| `/admin` | admin.dashboard |
| `/admin/products` | admin.products.index |
| `/admin/orders` | admin.orders.index |
| `/admin/orders/{order}/invoice` | admin.orders.invoice |
| `/admin/seo` | admin.seo.global |
| `/admin/sitemap.xml` | admin.sitemap |

## API (`routes/api.php`)

| Method | URI | Auth |
|--------|-----|------|
| POST | `/api/v1/login` | No |
| POST | `/api/v1/register` | No |
| GET | `/api/v1/products` | No |
| GET | `/api/v1/products/{slug}` | No |
| GET | `/api/v1/orders` | Sanctum |
