<div class="py-5">
    <div class="container">
        
        <!-- Breadcrumb / Back Link -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-navy text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/shop') }}" class="text-navy text-decoration-none">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/shop?category=' . urlencode($gem->category->name ?? '')) }}" class="text-navy text-decoration-none">{{ $gem->category->name ?? 'Gemstone' }}</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page">{{ $gem->name }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <!-- Left Column: Image Gallery & Certificates -->
            <div class="col-lg-6">
                <div class="bg-white p-3 rounded-3 shadow-sm border mb-4">
                    <!-- Active Main Image -->
                    <div class="text-center p-3" style="background-color: #fafafa; border-radius: 8px; overflow: hidden; height: 420px;">
                        <img src="{{ asset($activeImage) }}" class="img-fluid h-100" style="object-fit: contain;" alt="{{ $gem->name }}">
                    </div>

                    <!-- Thumbnails Gallery -->
                    <div class="row g-2 mt-3">
                        @foreach($galleryImages as $galleryPath)
                        <div class="col-3">
                            <div class="gallery-thumbnail ratio ratio-1x1 border {{ $activeImage == $galleryPath ? 'active' : '' }}" wire:click="changeImage('{{ $galleryPath }}')">
                                <img src="{{ asset($galleryPath) }}" class="img-fluid object-fit-cover" alt="{{ $gem->name }}" loading="lazy">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Astro Planetary Association Info -->
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white mb-4">
                    <div class="card-header bg-navy text-white py-3 cinzel-font">
                        <i class="bi bi-stars text-warning me-2"></i>Astrological Wearing Guide
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <span class="text-muted d-block small">Planet Ruler</span>
                                <strong class="text-navy">
                                    @if(($gem->category->name ?? '') == 'Ruby') Sun (Surya)
                                    @elseif(($gem->category->name ?? '') == 'Emerald') Mercury (Budh)
                                    @elseif(($gem->category->name ?? '') == 'Blue Sapphire') Saturn (Shani)
                                    @elseif(($gem->category->name ?? '') == 'Yellow Sapphire') Jupiter (Guru)
                                    @elseif(($gem->category->name ?? '') == 'Opal') Venus (Shukra)
                                    @else Moon (Chandra)
                                    @endif
                                </strong>
                            </div>
                            <div class="col-sm-6">
                                <span class="text-muted d-block small">Recommended Finger</span>
                                <strong class="text-navy">
                                    @if(($gem->category->name ?? '') == 'Ruby') Ring Finger of right hand
                                    @elseif(($gem->category->name ?? '') == 'Emerald') Little Finger of right hand
                                    @elseif(($gem->category->name ?? '') == 'Blue Sapphire') Middle Finger of right hand
                                    @elseif(($gem->category->name ?? '') == 'Yellow Sapphire') Index Finger of right hand
                                    @elseif(($gem->category->name ?? '') == 'Opal') Ring Finger of right hand
                                    @else Little Finger of working hand
                                    @endif
                                </strong>
                            </div>
                            <div class="col-sm-6">
                                <span class="text-muted d-block small">Suitable Metal</span>
                                <strong class="text-navy">
                                    @if(($gem->category->name ?? '') == 'Ruby' || ($gem->category->name ?? '') == 'Yellow Sapphire') Gold / Panchdhatu
                                    @elseif(($gem->category->name ?? '') == 'Blue Sapphire' || ($gem->category->name ?? '') == 'Opal' || ($gem->category->name ?? '') == 'Pearl' || ($gem->category->name ?? '') == 'Emerald') Gold / Silver / Platinum
                                    @endif
                                </strong>
                            </div>
                            <div class="col-sm-6">
                                <span class="text-muted d-block small">Auspicious Day & Time</span>
                                <strong class="text-navy">
                                    @if(($gem->category->name ?? '') == 'Ruby') Sunday Morning (6 AM - 8 AM)
                                    @elseif(($gem->category->name ?? '') == 'Emerald') Wednesday Morning (6 AM - 9 AM)
                                    @elseif(($gem->category->name ?? '') == 'Blue Sapphire') Saturday Evening (during Twilight)
                                    @elseif(($gem->category->name ?? '') == 'Yellow Sapphire') Thursday Morning (6 AM - 8:30 AM)
                                    @elseif(($gem->category->name ?? '') == 'Opal') Friday Morning (6 AM - 8 AM)
                                    @else Monday Morning (during Shukla Paksha)
                                    @endif
                                </strong>
                            </div>
                        </div>

                        <hr class="my-3">

                        <span class="text-muted d-block small mb-1">Beej Purification Mantra</span>
                        <blockquote class="blockquote bg-light p-3 rounded fs-7 mb-0 border-start border-warning border-3 font-monospace">
                            @if(($gem->category->name ?? '') == 'Ruby') "Om Hraam Hreem Hroum Sah Suryaya Namah" (108 Times)
                            @elseif(($gem->category->name ?? '') == 'Emerald') "Om Braam Breem Broum Sah Budhaya Namah" (108 Times)
                            @elseif(($gem->category->name ?? '') == 'Blue Sapphire') "Om Praam Preem Proum Sah Shanaye Namah" (108 Times)
                            @elseif(($gem->category->name ?? '') == 'Yellow Sapphire') "Om Graam Greem Groum Sah Gurave Namah" (108 Times)
                            @elseif(($gem->category->name ?? '') == 'Opal') "Om Draam Dreem Droum Sah Shukraya Namah" (108 Times)
                            @else "Om Shraam Shreem Shroum Sah Chandraya Namah" (108 Times)
                            @endif
                        </blockquote>
                    </div>
                </div>
            </div>

            <!-- Right Column: Product Info & Cart Operations -->
            <div class="col-lg-6">
                <div class="bg-white p-4 p-md-5 rounded-3 shadow-sm border mb-4">
                    <span class="badge bg-success mb-2"><i class="bi bi-shield-check me-1"></i> Certified Natural Gemstone</span>
                    <h2 class="h3 fw-bold text-navy cinzel-font mb-2">{{ $gem->name }}</h2>
                    <p class="text-muted small">Origin: <strong>{{ $gem->origin }}</strong> | Treatment: <strong>{{ $gem->treatment }}</strong></p>
                    
                    <div class="my-4 p-3 bg-light rounded-3 d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small d-block">Astrological Price (All Included)</span>
                            <span class="fs-2 fw-bold text-navy">?{{ number_format($gem->price, 2) }}</span>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-secondary py-2 px-3 d-block mt-1">{{ $gem->weight }} {{ $gem->weight_unit }}</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="h6 fw-bold text-navy text-uppercase mb-2">Gemstone Description</h4>
                        <p class="text-muted leading-relaxed small">{{ $gem->description }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="h6 fw-bold text-navy text-uppercase mb-2">Astrological Power</h4>
                        <p class="text-muted leading-relaxed small">{{ $gem->astrological_benefits }}</p>
                    </div>

                    <!-- Cart Actions -->
                    <div class="d-grid gap-3 pt-3 border-top">
                        <div class="row g-2">
                            <div class="col-md-6 col-12">
                                <button class="btn btn-navy w-100 py-3 d-flex align-items-center justify-content-center gap-2" wire:click="addToCart">
                                    <i class="bi bi-cart-plus fs-5"></i> Add To Cart
                                </button>
                            </div>
                            <div class="col-md-6 col-12">
                                <button class="btn btn-gold w-100 py-3 d-flex align-items-center justify-content-center gap-2" wire:click="buyNow">
                                    <i class="bi bi-lightning-fill"></i> Buy Now
                                </button>
                            </div>
                        </div>

                        <a href="https://wa.me/{{ $whatsapp }}?text=Hi! I am interested in buying {{ urlencode($gem->name) }} (Weight: {{ $gem->weight }} {{ $gem->weight_unit }}). Please send video/details." target="_blank" class="btn btn-outline-success py-3 d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-whatsapp fs-5"></i> Ask Expert on WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Verification Box (Like GemPundit certificate checking) -->
                <div class="card border-warning border-1 shadow-sm rounded-3 bg-white mb-4">
                    <div class="card-body p-4">
                        <h4 class="h6 fw-bold text-navy mb-2"><i class="bi bi-qr-code-scan text-warning me-2"></i>Verify Lab Certificate Online</h4>
                        <p class="text-muted small mb-3">Verify the authenticity of this stone directly with the lab registry database.</p>
                        
                        <div class="input-group">
                            <input type="text" class="form-control" wire:model="certificateInput" placeholder="Enter Certificate No.">
                            <button class="btn btn-navy" type="button" wire:click="verifyCertificate">Verify</button>
                        </div>

                        @if($verificationResult)
                            <div class="mt-3 p-3 rounded small {{ $verificationResult['status'] == 'success' ? 'bg-success-subtle border border-success text-success' : 'bg-danger-subtle border border-danger text-danger' }}">
                                <h5 class="h6 fw-bold mb-2">
                                    <i class="bi {{ $verificationResult['status'] == 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill' }} me-2"></i>
                                    {{ $verificationResult['message'] }}
                                </h5>
                                
                                @if($verificationResult['status'] == 'success')
                                    <table class="table table-sm table-borderless mb-0 mt-2 text-success small">
                                        @foreach($verificationResult['details'] as $key => $val)
                                            <tr>
                                                <td class="p-0 fw-bold">{{ $key }}:</td>
                                                <td class="p-0">{{ $val }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Technical Specifications Table -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-white p-4 p-md-5 rounded-3 shadow-sm border">
                    <h3 class="h4 fw-bold text-navy cinzel-font mb-4"><i class="bi bi-file-earmark-text text-warning me-2"></i>Technical Identification Details</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped specs-table mb-0 small">
                            <tbody>
                                <tr>
                                    <th width="30%">Gem Identification</th>
                                    <td>{{ $gem->category->name ?? 'Gemstone' }} (Natural)</td>
                                    <th width="30%">Color Tone</th>
                                    <td>{{ $gem->color }}</td>
                                </tr>
                                <tr>
                                    <th>Total Weight</th>
                                    <td colspan="3">{{ $gem->weight }} {{ $gem->weight_unit }}</td>
                                </tr>
                                <tr>
                                    <th>Cut & Shape</th>
                                    <td>{{ $gem->shape }}</td>
                                    <th>Optical Origin</th>
                                    <td>{{ $gem->origin }}</td>
                                </tr>
                                <tr>
                                    <th>Refractive Index</th>
                                    <td>
                                        @if(($gem->category->name ?? '') == 'Ruby' || ($gem->category->name ?? '') == 'Blue Sapphire' || ($gem->category->name ?? '') == 'Yellow Sapphire') 1.762 - 1.770
                                        @elseif(($gem->category->name ?? '') == 'Emerald') 1.577 - 1.583
                                        @elseif(($gem->category->name ?? '') == 'Opal') 1.450
                                        @else 1.530 - 1.680
                                        @endif
                                    </td>
                                    <th>Specific Gravity</th>
                                    <td>
                                        @if(($gem->category->name ?? '') == 'Ruby' || ($gem->category->name ?? '') == 'Blue Sapphire' || ($gem->category->name ?? '') == 'Yellow Sapphire') 4.00
                                        @elseif(($gem->category->name ?? '') == 'Emerald') 2.72
                                        @elseif(($gem->category->name ?? '') == 'Opal') 2.15
                                        @else 2.73
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Treatments Checked</th>
                                    <td>{{ $gem->treatment }}</td>
                                    <th>Certificate Authority</th>
                                    <td>{{ $gem->certification_type }} (Reg: {{ $gem->certification_no }})</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        @if($related->count() > 0)
            <div class="row mt-5 pt-4">
                <div class="col-12 mb-4">
                    <h3 class="h4 fw-bold text-navy cinzel-font"><i class="bi bi-grid-fill text-warning me-2"></i>Other Recommended {{ $gem->category->name ?? 'Gemstone' }}s</h3>
                </div>
                @foreach($related as $rgem)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="gem-card shadow-sm">
                            <div class="img-container">
                                <img src="{{ $rgem->primaryImage() ? asset('storage/' . $rgem->primaryImage()->path) : asset('images/placeholder.jpg') }}" alt="{{ $rgem->name }}">
                                <span class="gem-tag-certified">Certified Natural</span>
                                <span class="gem-badge-weight">{{ $rgem->weight }} {{ $rgem->weight_unit }}</span>
                            </div>
                            <div class="p-3">
                                <span class="text-muted small text-uppercase tracking-wider">{{ $rgem->category->name ?? 'Gemstone' }}</span>
                                <h3 class="gem-card-title mt-1"><a href="{{ url('/gemstone/' . $rgem->slug) }}" class="text-decoration-none text-navy">{{ $rgem->name }}</a></h3>
                                
                                <div class="d-flex justify-content-between align-items-center my-3">
                                    <div>
                                        <small class="text-muted d-block fs-8">Origin: {{ $rgem->origin }}</small>
                                    </div>
                                    <span class="gem-price">?{{ number_format($rgem->price, 2) }}</span>
                                </div>

                                <div class="d-grid gap-2">
                                    <a href="{{ url('/gemstone/' . $rgem->slug) }}" class="btn btn-navy btn-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
