# Module Flow Diagram

```mermaid
flowchart TB
    subgraph Storefront
        A[Home / Shop] --> B[Product Detail]
        B --> C[Cart Session]
        C --> D[Checkout Livewire]
        D --> E{Payment Gateway}
        E --> F[Razorpay]
        E --> G[Stripe]
        E --> H[PayPal]
        E --> I[COD / UPI]
        D --> J[Order Created]
        J --> K[Order Tracking]
    end

    subgraph Admin
        L[Dashboard Stats] --> M[Products CRUD]
        L --> N[Orders Management]
        N --> O[Status History]
        N --> P[Invoice PDF]
        L --> Q[Inventory Adjust]
        Q --> R[Stock Movement Log]
        L --> S[SEO Panel]
        S --> T[XML Sitemap]
    end

    subgraph Services
        D --> U[PaymentGatewayManager]
        M --> V[AiContentGeneratorService]
        S --> V
        Q --> W[InventoryService]
    end

    J --> N
    M --> A
```

## Order Lifecycle

```mermaid
stateDiagram-v2
    [*] --> Pending
    Pending --> Confirmed
    Confirmed --> Processing
    Processing --> Packed
    Packed --> Shipped
    Shipped --> Delivered
    Pending --> Cancelled
    Delivered --> Returned
    Returned --> Refunded
    Cancelled --> [*]
    Delivered --> [*]
    Refunded --> [*]
```

## Route Structure

| Prefix | File | Purpose |
|--------|------|---------|
| `/` | `web.php` | Storefront Livewire pages |
| `/admin` | `admin.php` | Admin panel (auth + admin middleware) |
| `/api/v1` | `api.php` | REST API (Sanctum) |
