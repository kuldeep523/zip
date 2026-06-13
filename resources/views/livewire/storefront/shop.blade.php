<div class="py-5">
    <div class="container">

        <!-- Shop Header -->
        <div class="row mb-5">
            <div class="col-12 border-bottom border-warning border-2 pb-3">
                <span class="text-uppercase tracking-wider text-warning fw-bold fs-7">
                    Udaipur's Trusted Jeweler
                </span>

                <h2 class="h1 cinzel-font text-navy mt-1">
                    Vedic Astrological Gemstones
                </h2>

                <p class="text-muted mb-0">
                    Browse through our collection of premium, lab-certified,
                    natural unheated gemstones.
                </p>
            </div>
        </div>

        <div class="row g-4">

            <!-- Sidebar Filters -->
            <div class="col-lg-3">

                <div class="card border-0 shadow-sm rounded-3 p-4 mb-4 bg-white">

                    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                        <h3 class="h6 mb-0 text-navy fw-bold text-uppercase">
                            <i class="bi bi-funnel-fill text-warning me-2"></i>
                            Filters
                        </h3>

                        <button class="btn btn-link text-danger btn-sm p-0 text-decoration-none">
                            Reset All
                        </button>
                    </div>

                    <!-- Search -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-navy small">
                            Search keyword
                        </label>

                        <input type="text"
                               class="form-control"
                               placeholder="Type Ruby, Neelam...">
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-navy small">
                            Gemstone Category
                        </label>

                        <select class="form-select">

                            <option value="">All Categories</option>

                            @foreach($categories as $cat)

                                <option value="{{ $cat->value }}">
                                    {{ $cat->label }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <!-- Shape -->
                    <div class="mb-4">

                        <label class="form-label fw-bold text-navy small">
                            Gem Cut / Shape
                        </label>

                        <select class="form-select">

                            <option value="">All Shapes</option>

                            @foreach($shapes as $s)

                                <option value="{{ $s->value }}">
                                    {{ $s->label }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <!-- Origin -->
                    <div class="mb-4">

                        <label class="form-label fw-bold text-navy small">
                            Origin
                        </label>

                        <select class="form-select">

                            <option value="">All Origins</option>

                            @foreach($origins as $o)

                                <option value="{{ $o->value }}">
                                    {{ $o->label }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <!-- Color -->
                    <div class="mb-4">

                        <label class="form-label fw-bold text-navy small">
                            Color
                        </label>

                        <select class="form-select">

                            <option value="">All Colors</option>

                            @foreach($colors as $c)

                                <option value="{{ $c->value }}">
                                    {{ $c->label }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <!-- Price -->
                    <div class="mb-4">

                        <label class="form-label fw-bold text-navy small">
                            Max Price (₹100000)
                        </label>

                        <input type="range"
                               class="form-range"
                               min="5000"
                               max="100000"
                               step="5000">

                        <div class="d-flex justify-content-between text-muted small">
                            <span>₹5,000</span>
                            <span>₹100,000</span>
                        </div>
                    </div>
                </div>

                <!-- Consultation -->
                <div class="card border-0 text-white rounded-3 shadow-sm overflow-hidden mb-4"
                     style="background: linear-gradient(135deg, #0e2038 0%, #084c3c 100%);">

                    <div class="card-body p-4 text-center">

                        <i class="bi bi-telephone-inbound fs-2 text-warning mb-3"></i>

                        <h4 class="h6 text-warning cinzel-font fw-bold mb-2">
                            Confused about Gem Weight?
                        </h4>

                        <p class="small text-white-50 mb-3">
                            Ask our Vedic Astrologist for a customized
                            Ratti recommendation based on your birth chart.
                        </p>

                        <a href="https://wa.me/919876543210"
                           target="_blank"
                           class="btn btn-gold btn-sm w-100">

                            Contact Expert
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-lg-9">

                <!-- Top Bar -->
                <div class="bg-white rounded-3 shadow-sm p-3 mb-4 d-flex justify-content-between align-items-center">

                    <span class="text-muted small">
                        Showing
                        <strong>{{ $gemstones->count() }}</strong>
                        certified gemstone(s)
                    </span>

                    <select class="form-select form-select-sm w-auto">

                        <option>Default Popularity</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>

                    </select>
                </div>

                <!-- Product List -->
                <div class="row g-4">

                    @foreach($gemstones as $gem)

                        <div class="col-md-4 col-sm-6">

                            <div class="gem-card shadow-sm">

                                <div class="img-container">

                                    <img src="{{ $gem->primaryImage() ? asset('storage/' . $gem->primaryImage()->path) : asset('images/placeholder.jpg') }}"
                                         alt="{{ $gem->name }}"
                                         class="img-fluid">

                                    <span class="gem-tag-certified">
                                        Certified Natural
                                    </span>

                                    <span class="gem-badge-weight">
                                        {{ $gem->weight }} {{ $gem->weight_unit }}
                                    </span>
                                </div>

                                <div class="p-3">

                                    <span class="text-muted small text-uppercase tracking-wider">
                                        {{ $gem->category->name ?? 'Gemstone' }}
                                    </span>

                                    <h3 class="gem-card-title mt-1">

                                        <a href="#"
                                           class="text-decoration-none text-navy">

                                            {{ $gem->name }}

                                        </a>
                                    </h3>

                                    <div class="d-flex justify-content-between align-items-center my-3">

                                        <div>
                                            <small class="text-muted d-block fs-8">
                                                Origin: {{ $gem->origin }}
                                            </small>
                                        </div>

                                        <span class="gem-price">
                                            ₹{{ number_format($gem->price, 2) }}
                                        </span>
                                    </div>

                                    <div class="d-grid gap-2">

                                        <button class="btn btn-navy btn-sm">
                                            <i class="bi bi-cart-plus me-1"></i>
                                            Add To Cart
                                        </button>

                                        <a href="https://wa.me/919876543210"
                                           target="_blank"
                                           class="btn btn-outline-success btn-sm">

                                            <i class="bi bi-whatsapp"></i>
                                            Ask on WhatsApp
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>