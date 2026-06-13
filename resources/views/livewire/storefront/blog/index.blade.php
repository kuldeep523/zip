<div class="rr-blog-page">
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

.rr-blog-page{
    background:#fafafa;
}

.rr-blog-hero{
    padding:90px 0;
    text-align:center;
    background:linear-gradient(
        135deg,
        #fff8e8,
        #ffffff
    );
}

.rr-blog-subtitle{
    color:var(--rr-gold);
    font-weight:600;
    text-transform:uppercase;
    letter-spacing:2px;
}

.rr-blog-heading{
    font-size:58px;
    font-weight:700;
    margin-top:15px;
    color:var(--rr-text);
}

.rr-blog-heading span{
    color:var(--rr-gold);
}

.rr-blog-desc{
    max-width:700px;
    margin:20px auto 0;
    color:#666;
    font-size:18px;
}

.rr-blog-card{
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    height:100%;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    transition:.35s;
}

.rr-blog-card:hover{
    transform:translateY(-8px);
}

.rr-blog-image{
    overflow:hidden;
}

.rr-blog-image img{
    width:100%;
    height:260px;
    object-fit:cover;
    transition:.5s;
}

.rr-blog-card:hover img{
    transform:scale(1.08);
}

.rr-blog-content{
    padding:25px;
}

.rr-blog-date{
    color:var(--rr-gold);
    font-size:13px;
    font-weight:600;
}

.rr-blog-content h3{
    margin:15px 0;
    font-size:24px;
    line-height:1.4;
}

.rr-blog-content h3 a{
    color:var(--rr-text);
    text-decoration:none;
}

.rr-blog-content p{
    color:#666;
    line-height:1.8;
}

.rr-blog-footer{
    margin-top:25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.rr-author{
    display:flex;
    align-items:center;
    gap:10px;
}

.rr-author-avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    background:var(--rr-gold);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

.rr-read-more{
    color:var(--rr-blue);
    font-weight:600;
    text-decoration:none;
}

.rr-read-more:hover{
    color:var(--rr-gold);
}

.pagination{
    justify-content:center;
}

.page-link{
    border:none;
    color:var(--rr-text);
    margin:0 4px;
    border-radius:10px;
}

.page-item.active .page-link{
    background:var(--rr-gold);
    border-color:var(--rr-gold);
}

@media(max-width:768px){

    .rr-blog-heading{
        font-size:36px;
    }

    .rr-blog-footer{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }
}
</style>
    {{-- Hero Section --}}
    <section class="rr-blog-hero">
        <div class="container">

            <span class="rr-blog-subtitle">
                Gemstone & Jewelry Insights
            </span>

            <h1 class="rr-blog-heading">
                Discover the World of
                <span>Precious Gemstones</span>
            </h1>

            <p class="rr-blog-desc">
                Explore expert guides, gemstone meanings,
                astrology insights, jewelry trends and
                buying tips from our specialists.
            </p>

        </div>
    </section>

    {{-- Blog Grid --}}
    <section class="py-5">
        <div class="container">

            <div class="row g-4">

                @foreach($blogs as $blog)

                    <div class="col-lg-4 col-md-6">

                        <article class="rr-blog-card">

                            <a href="{{ route('storefront.blog.show', $blog->slug) }}">

                                <div class="rr-blog-image">

                                    @if($blog->featured_image)
                                        <img
                                            src="{{ asset('storage/'.$blog->featured_image) }}"
                                            alt="{{ $blog->title }}"
                                        >
                                    @else
                                        <img
                                            src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338"
                                            alt="{{ $blog->title }}"
                                        >
                                    @endif

                                </div>

                            </a>

                            <div class="rr-blog-content">

                                <span class="rr-blog-date">
                                    {{ $blog->published_at?->format('d M Y') }}
                                </span>

                                <h3>
                                    <a href="{{ route('storefront.blog.show', $blog->slug) }}">
                                        {{ Str::limit($blog->title, 60) }}
                                    </a>
                                </h3>

                                <p>
                                    {{ Str::limit(strip_tags($blog->content), 120) }}
                                </p>

                                <div class="rr-blog-footer">

                                    <div class="rr-author">
                                        <div class="rr-author-avatar">
                                            {{ substr($blog->author?->name ?? 'A',0,1) }}
                                        </div>

                                        <span>
                                            {{ $blog->author?->name ?? 'Admin' }}
                                        </span>
                                    </div>

                                    <a
                                        href="{{ route('storefront.blog.show', $blog->slug) }}"
                                        class="rr-read-more"
                                    >
                                        Read More →
                                    </a>

                                </div>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>

            <div class="mt-5">
                {{ $blogs->links() }}
            </div>

        </div>
    </section>

</div>