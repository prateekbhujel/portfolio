@extends('frontend.layouts.layout')

@section('title', 'Portfolios')

@section('content')

{{-- Banner Start --}}
<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-7">
                <h2 class="title">Porfolio's</h2>
            </div>
        
        </div>
    </div>
</header>
{{-- Banner end --}}


    <!-- Portfolio-Area-Start -->
        <section class="portfolio-area section-padding" id="portfolio-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="filter-menu">
                            <li class="active" data-filter="*">All Projects</li>
                            @foreach ($portfolioCategories as $cat)
                                <li data-filter=".{{ $cat->slug }}">{{ $cat->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row portfolios">
                        @foreach ($portfolioItems as $item)
                        <div data-wow-delay="0.3s" class="col-md-6 col-lg-4 filter-item {{ $item->category->slug }}">
                            <div class="single-portfolio">
                                <figure class="portfolio-image">
                                    <img src="{{ asset('public' . $item->image) }}" alt="">
                                </figure>
                                <div class="portfolio-content">
                                    <a href="{{ asset('public' . $item->image) }}" data-lity class="icon"><i
                                            class="fas fa-plus"></i></a>
                                    <h4 class="title"><a href="{{ route('show.portfolio', $item->id) }}">{{ $item->title }}</a></h4>
                                    <div class="desc">
                                        <p>{!! Str::limit(strip_tags($item->description), 100) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <nav class="navigation pagination">
                            <div class="nav-links d-flex justify-content-center">
                                {{ $portfolioItems->links() }}
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    <!-- Portfolio-Area-End -->


@endsection