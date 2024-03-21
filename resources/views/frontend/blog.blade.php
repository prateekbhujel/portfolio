@extends('frontend.layouts.layout')

@section('title', 'Blogs')

@section('content')

{{-- Banner Start --}}
<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-7">
                <h2 class="title">Blog</h2>
            </div>
        </div>
    </div>
</header>
{{-- Banner end --}}

<!-- Blogs-Area-Start -->
<section class="blog-area section-padding">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-xl-4 col-md-6">
                    <div class="single-blog">
                        <figure class="blog-image">
                            <img src="{{ asset('public'. $blog->image) }}" alt="blog-image">
                        </figure>
                        <div class="blog-content">
                            <h3 class="title"><a href="blog-details.html">Great things never come from.</a></h3>
                            <div class="desc">
                                {!! Str::limit(strip_tags($blog->description), 100, '...') !!}
                            </div>
                            <a href="{{ route('show.blog.detail', $blog->id) }}" class="button-primary-trans mouse-dir">Read More <span
                                    class="dir-part"></span> <i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <nav class="navigation pagination">
                    <div class="nav-links d-flex justify-content-center">
                        {{ $blogs->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Blogs-Area-End -->


@endsection