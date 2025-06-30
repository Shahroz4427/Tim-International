<html
    lang="en-AU"
    class="avada-html-layout-wide avada-html-header-position-top avada-is-100-percent-template ua-windows_nt ua-windows_nt-10 ua-windows_nt-10-0 ua-chrome ua-chrome-137 ua-chrome-137-0 ua-chrome-137-0-0 ua-chrome-137-0-0-0 ua-desktop ua-desktop-windows ua-webkit ua-webkit-537 ua-webkit-537-36 js touchevents no-applicationcache audio audio-ogg audio-mp3 audio-opus audio-wav audio-m4a canvas canvastext hashchange geolocation history inputtypes-search inputtypes-tel inputtypes-url inputtypes-email no-inputtypes-datetime inputtypes-date inputtypes-month inputtypes-week inputtypes-time inputtypes-datetime-local inputtypes-number inputtypes-range inputtypes-color postmessage postmessage-structuredclones video no-video-ogg video-h264 no-video-h265 video-webm video-vp9 no-video-hls no-video-av1 webgl websockets cssanimations backgroundsize borderimage borderradius boxshadow flexbox fontface generatedcontent cssgradients hsla multiplebgs opacity cssreflections rgba textshadow csstransforms supports csstransforms3d csstransitions localstorage sessionstorage no-websqldatabase svgclippaths inlinesvg smil webworkers"
    prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"
    data-useragent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="max-image-preview:large" />
    <link rel="stylesheet" href="{{ asset('frontend/services/css/main.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <title>TIM INTERNATIONAL</title>
</head>

<body
    class="home wp-singular page-template page-template-100-width page-template-100-width-php page page-id-2 wp-theme-Avada wp-child-theme-Avada-child tribe-js awb-no-sidebars fusion-image-hovers fusion-pagination-sizing fusion-button_type-flat fusion-button_span-no fusion-button_gradient-linear avada-image-rollover-circle-yes avada-image-rollover-yes avada-image-rollover-direction-left fusion-body ltr fusion-sticky-header no-mobile-slidingbar no-mobile-totop avada-has-rev-slider-styles fusion-disable-outline fusion-sub-menu-fade mobile-logo-pos-left layout-wide-mode avada-has-boxed-modal-shadow-none layout-scroll-offset-full avada-has-zero-margin-offset-top fusion-top-header menu-text-align-center mobile-menu-design-modern fusion-show-pagination-text fusion-header-layout-v1 avada-responsive avada-footer-fx-none avada-menu-highlight-style-textcolor fusion-search-form-clean fusion-main-menu-search-overlay fusion-avatar-circle avada-dropdown-styles avada-blog-layout-large avada-blog-archive-layout-large avada-ec-not-100-width avada-ec-meta-layout-sidebar avada-header-shadow-no avada-menu-icon-position-left avada-has-megamenu-shadow avada-has-header-100-width avada-has-pagetitle-bg-parallax avada-has-breadcrumb-mobile-hidden avada-has-titlebar-hide avada-header-border-color-full-transparent avada-has-pagination-width_height avada-flyout-menu-direction-fade avada-ec-views-v2 do-animate fusion-no-touch"
    data-awb-post-id="2"
    style="--viewportWidth: 1366;"
    cz-shortcut-listen="true">
    <div id="boxed-wrapper">
        <div id="wrapper" class="fusion-wrapper">

            @include('frontend.header')

            <section class="services-section" style="margin-top:100px;min-height: 100vh;">
                <h2>SERVICES</h2>
                @if($services->isEmpty())
                    <div style="min-height: 60vh; display: flex; justify-content: center; align-items: center; width: 100%;">
                        <h2 style="margin: 0; font-size: 2rem; color: #555; text-transform: uppercase; font-weight: lighter !important;">No Service Available</h2>
                    </div>
                    @else
                <div class="services-grid">
                   
                    @foreach($services as $service)
                    <div class="service-item">
                        <a href="{{ route('service.detail',$service->id) }}">
                            <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}">
                            <div class="overlay">{{ $service->name }}</div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </section>

            @include('frontend.footer')
        </div>
    </div>
</body>

</html>