<header class="header-area parallax-bg" id="home-page" @isset($hero->image) style="background-image: url('{{ asset("public$hero->image") }}')" @endisset>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-text">
                    <h3 class="typer-title wow fadeInUp" data-wow-delay="0.2s">
                        @if ($hero)
                            {{ $hero->title }}
                        @else
                            I'm ui/ux designer
                        @endif
                    </h3>
                    <h1 class="title wow fadeInUp" data-wow-delay="0.3s">
                        @if ($hero)
                            {{ $hero->title }}
                        @else
                            Hi, I am Smith Jhon
                        @endif
                    </h1>
                    <div class="desc wow fadeInUp" data-wow-delay="0.4s">
                        <p>
                            @if ($hero && $hero->sub_title)
                                {{ $hero->sub_title }}
                            @else
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque at, aperiam corrupti
                                earum quasi, porro voluptatem commodi eos laboriosam nam quis nostrum, molestiae
                                nesciunt dolore.
                            @endif
                        </p>
                    </div>
                    @if ($hero && $hero->btn_text)
                        <a href="{{ isset($hero->btn_url) ? route($hero->btn_url) : '#' }}" class="button-dark mouse-dir wow fadeInUp" data-wow-delay="0.5s">
                            {{ ucwords($hero->btn_text) }} <span class="dir-part"></span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
