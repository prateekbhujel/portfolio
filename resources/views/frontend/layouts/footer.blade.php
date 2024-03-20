
<footer class="footer-area">
<div class="container">
    <div class="row footer-widgets">
        <div class="col-md-12 col-lg-3 widget">
            <div class="text-box">
                <figure class="footer-logo">
                    <img src="public/frontend/assets/images/logo.png" alt="logo-image">
                </figure>
                <p>{{ $footerInfo->info }}</p>
                <ul class="d-flex flex-wrap">
                    @foreach ($footerIcons as $icon)
                        <li><a href="{{ $icon->url }}" target="_blank"><i class="{{ $icon->icon }}"></i></a></li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 offset-lg-1 widget">
            <h3 class="widget-title">Useful Link</h3>
            <ul class="nav-menu">
                @foreach ($footerUsefulLinks as $link)
                    <li><a href="{{ $link->url }}">{{ $link->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4 col-lg-3 widget">
            <h3 class="widget-title">Contact Info</h3>
            <ul>
                <li>{{ $footerContactInfo->address }}</li>
                <li><a href="tel:{{ $footerContactInfo->phone }}">{{ $footerContactInfo->phone }}</a></li>
                <li><a href="mailto:{{ $footerContactInfo->email }}">{{ $footerContactInfo->email }}</a></li>                
            </ul>
        </div>
        <div class="col-md-4 col-lg-3 widget">
            <h3 class="widget-title">Help</h3>
            <ul class="nav-menu">
                @foreach ($footerHelpLinks as $helpLink)
                    <li><a href="{{ $helpLink->url }}">{{ $helpLink->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="copyright">
                    <p>{!! $footerInfo->copy_right !!} | {{ date('Y') }}</p>
                    <p>{!! $footerInfo->powered_by !!} ~ {{ date('Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
