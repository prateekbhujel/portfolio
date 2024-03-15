@extends('frontend.layouts.layout')

@section('title', 'Blog Detail')

@section('content')

{{-- Banner Start --}}
<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-8">
                <h2 class="title">Blog Details</h2>
            </div>
            <div class="col-sm-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Portfolio</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
{{-- Banner end --}}

<!-- Blog details-Area-Start -->
<section class="blog-details section-padding">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="head-title">{{ $blogDetail->title }}</h2>
            <div class="blog-meta">
                <div class="single-meta">
                    <div class="meta-title">Published</div>
                    <h4 class="meta-value"><a href="javascript:void(0)">{{ date('d M, Y', strtotime($blogDetail->created_at)) }}</a></h4>
                </div>
                <div class="single-meta">
                    <div class="meta-title">Category</div>
                    <h4 class="meta-value"><a href="javascript:void(0)">{{ $blogDetail->getCategory->name }}</a></h4>
                </div>
            </div>
            <figure class="image-block">
                <img class="image-fix" src="{{ asset('public' . $blogDetail->image) }}" alt="blog-details-image.jpeg" style="object-fit: fill;">
            </figure>
            <div class="description">
                {!! $blogDetail->description !!}
            </div>
            <div class="single-navigation">
                @if ($previousPost)
                    <a href="{{ route('show.blog.detail', $previousPost->id) }}" class="nav-link"><span class="icon"><i
                        class="fal fa-angle-left"></i></span><span class="text">{{ $previousPost->title }}</span></a>
                @else
                    <a href="javascript:void(0)" class="nav-link"><span class="icon"><i
                    class="fal fa-angle-left"></i></span><span class="text">No Previous Post</span></a>
                @endif

                @if ($nextPost)
                    <a href="{{ route('show.blog.detail', $nextPost->id) }}" class="nav-link"><span class="text">{{ $nextPost->title }}</span><span
                        class="icon"><i class="fal fa-angle-right"></i></span></a>
                @else
                    <a href="javascript:void(0)" class="nav-link"><span class="text">No Next Post</span><span
                    class="icon"><i class="fal fa-angle-right"></i></span></a>
                @endif
            </div>
        </div>
    </div>
</div>
</section>
<!-- Blog details -Area-End -->

@endsection