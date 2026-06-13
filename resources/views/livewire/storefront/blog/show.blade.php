<div class="rr-blog-details">
<style>
    :root{
    --rr-orange:#f59e0b;
    --rr-orange-dark:#ea580c;
    --rr-blue:#1a5fa8;
    --rr-white:#ffffff;
    --rr-text:#1f2937;
    --rr-red:#D0201A;
    --rr-gold:#e8a800;
    --rr-green:#1e7e34;
}

.rr-blog-details{
    background:#fafafa;
}

.rr-blog-hero{
    padding:80px 0 50px;
    background:linear-gradient(
        135deg,
        #fff8e8,
        #ffffff
    );
}

.rr-blog-breadcrumb{
    margin-bottom:25px;
    color:#777;
    font-size:14px;
}

.rr-blog-breadcrumb a{
    text-decoration:none;
    color:var(--rr-blue);
}

.rr-blog-header{
    max-width:900px;
}

.rr-blog-meta{
    display:flex;
    gap:15px;
    margin-bottom:20px;
}

.rr-category{
    background:var(--rr-gold);
    color:#fff;
    padding:8px 18px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

.rr-date{
    color:#666;
    display:flex;
    align-items:center;
}

.rr-blog-title{
    font-size:52px;
    line-height:1.2;
    font-weight:700;
    color:var(--rr-text);
    margin-bottom:30px;
}

.rr-author{
    display:flex;
    align-items:center;
    gap:15px;
}

.rr-author-avatar{
    width:55px;
    height:55px;
    border-radius:50%;
    background:var(--rr-gold);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    font-weight:700;
}

.rr-author h6{
    margin:0;
    font-size:17px;
}

.rr-author span{
    color:#777;
    font-size:14px;
}

.rr-blog-image-section{
    margin-top:-20px;
}

.rr-blog-image{
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.1);
}

.rr-blog-image img{
    width:100%;
    height:600px;
    object-fit:cover;
}

.rr-blog-content-section{
    padding:70px 0;
}

.rr-content-wrapper{
    max-width:900px;
    margin:auto;
    background:#fff;
    padding:50px;
    border-radius:20px;
    box-shadow:0 5px 25px rgba(0,0,0,.06);
}

.rr-content-wrapper h2{
    color:var(--rr-blue);
    margin-top:30px;
    margin-bottom:15px;
}

.rr-content-wrapper h3{
    color:var(--rr-text);
    margin-top:25px;
}

.rr-content-wrapper p{
    line-height:1.9;
    color:#444;
    margin-bottom:20px;
}

.rr-content-wrapper img{
    width:100%;
    border-radius:15px;
    margin:25px 0;
}

.rr-related-blogs{
    padding:70px 0;
}

.rr-section-title{
    text-align:center;
    margin-bottom:50px;
}

.rr-section-title h2{
    font-size:40px;
    color:var(--rr-text);
}

.rr-related-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:30px;
}

.rr-related-card{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.rr-related-card:hover{
    transform:translateY(-8px);
}

.rr-related-card img{
    width:100%;
    height:250px;
    object-fit:cover;
}

.rr-related-body{
    padding:25px;
}

.rr-related-body span{
    color:var(--rr-gold);
    font-size:13px;
    font-weight:600;
}

.rr-related-body h4{
    margin:15px 0;
    font-size:22px;
}

.rr-related-body a{
    text-decoration:none;
    color:var(--rr-blue);
    font-weight:600;
}

@media(max-width:768px){

    .rr-blog-title{
        font-size:34px;
    }

    .rr-content-wrapper{
        padding:25px;
    }

    .rr-blog-image img{
        height:300px;
    }

    .rr-related-grid{
        grid-template-columns:1fr;
    }
}
    </style>

    {{-- Hero Section --}}
    <section class="rr-blog-hero">
        <div class="container">

            <div class="rr-blog-breadcrumb">
                <a href="/">Home</a>
                <span>/</span>
                <a href="/blog">Blog</a>
                <span>/</span>
                <span>{{ $blog->title }}</span>
            </div>

            <div class="rr-blog-header">

                <div class="rr-blog-meta">
                    <span class="rr-category">
                        Jewelry Guide
                    </span>

                    <span class="rr-date">
                        {{ $blog->published_at?->format('d M Y') }}
                    </span>
                </div>

                <h1 class="rr-blog-title">
                    {{ $blog->title }}
                </h1>

                <div class="rr-author">
                    <div class="rr-author-avatar">
                        {{ substr($blog->author?->name ?? 'A',0,1) }}
                    </div>

                    <div>
                        <h6>{{ $blog->author?->name ?? 'Admin' }}</h6>
                        <span>Jewelry Expert</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    <section class="rr-blog-image-section">
        <div class="container">
            <div class="rr-blog-image">

                @if($blog->featured_image)
                    <img
                        src="{{ asset('storage/'.$blog->featured_image) }}"
                        alt="{{ $blog->title }}"
                    >
                @else
                    <img
                        src="https://images.unsplash.com/photo-1617038220319-276d3cfab638"
                        alt="Blog Image"
                    >
                @endif

            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="rr-blog-content-section">
        <div class="container">

            <div class="rr-content-wrapper">

                {!! $blog->content !!}

            </div>

        </div>
    </section>

    {{-- Related Blogs --}}
    <section class="rr-related-blogs">
        <div class="container">

            <div class="rr-section-title">
                <h2>Related Articles</h2>
                <p>Explore more jewelry and gemstone insights.</p>
            </div>

            <div class="rr-related-grid">

                @foreach($relatedBlogs as $related)
                    <div class="rr-related-card">

                        <a href="{{ route('storefront.blog.show', $related->slug) }}">
                            @if($related->featured_image)
                                <img
                                    src="{{ asset('storage/'.$related->featured_image) }}"
                                    alt="{{ $related->title }}"
                                >
                            @else
                                <img
                                    src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338"
                                    alt="{{ $related->title }}"
                                >
                            @endif
                        </a>

                        <div class="rr-related-body">
                            <span>{{ $related->category?->name ?? 'Jewelry Tips' }}</span>

                            <h4>
                                <a href="{{ route('storefront.blog.show', $related->slug) }}">
                                    {{ Str::limit($related->title, 50) }}
                                </a>
                            </h4>

                            <a href="{{ route('storefront.blog.show', $related->slug) }}">
                                Read More →
                            </a>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </section>

</div>