# Database ER Diagram

```mermaid
erDiagram
    users ||--o{ orders : places
    users ||--o{ addresses : has
    users ||--o{ wishlists : owns
    users ||--o{ reviews : writes
    users ||--o{ loyalty_point_transactions : earns

    categories ||--o{ categories : parent_child
    categories ||--o{ products : contains
    brands ||--o{ products : manufactures

    products ||--o{ product_images : has
    products ||--o{ product_variants : has
    products ||--o{ reviews : receives
    products ||--o{ inventory_movements : tracks

    orders ||--|{ order_items : contains
    orders ||--o{ order_status_histories : logs
    orders ||--o{ return_requests : may_have
    orders ||--o{ payment_transactions : pays_via
    orders }o--o| coupons : uses

    coupons ||--o{ coupon_product : applies_to
    coupons ||--o{ coupon_category : applies_to

    shipping_zones ||--o{ shipping_rates : defines
    shipping_zones ||--o{ free_shipping_rules : enables

    suppliers ||--o{ purchase_entries : supplies
    purchase_entries ||--|{ purchase_entry_items : lists

    blogs }o--|| blog_categories : categorized
    blogs }o--o{ blog_tags : tagged
    blogs }o--|| users : authored_by

    banners }o--o| categories : optional_link
    cms_pages ||--|| global_seo_settings : site_config

    wishlists ||--|{ wishlist_items : contains
    products ||--o{ wishlist_items : in
```

## Core Tables (40+)

- **Catalog**: `categories`, `brands`, `products`, `product_images`, `product_variants`
- **Commerce**: `orders`, `order_items`, `order_status_histories`, `return_requests`, `coupons`, `coupon_product`, `coupon_category`
- **Customers**: `users`, `addresses`, `wishlists`, `wishlist_items`, `compare_products`, `recently_viewed_products`
- **Inventory**: `suppliers`, `purchase_entries`, `purchase_entry_items`, `inventory_movements`
- **Shipping**: `shipping_zones`, `shipping_rates`, `free_shipping_rules`
- **Payments**: `payment_transactions`
- **Content**: `cms_pages`, `blogs`, `blog_categories`, `blog_tags`, `banners`, `reviews`
- **Marketing**: `newsletter_subscribers`, `email_campaigns`, `abandoned_carts`, `loyalty_point_transactions`, `referrals`
- **i18n**: `languages`, `currencies`
- **SEO**: `global_seo_settings` (+ per-entity SEO columns)
- **System**: Spatie `roles`, `permissions`, `activity_log`, `login_logs`
