<html class="avada-html-layout-wide avada-html-header-position-top avada-is-100-percent-template ua-windows_nt ua-windows_nt-10 ua-windows_nt-10-0 ua-chrome ua-chrome-137 ua-chrome-137-0 ua-chrome-137-0-0 ua-chrome-137-0-0-0 ua-desktop ua-desktop-windows ua-webkit ua-webkit-537 ua-webkit-537-36 js touchevents no-applicationcache audio audio-ogg audio-mp3 audio-opus audio-wav audio-m4a canvas canvastext hashchange geolocation history inputtypes-search inputtypes-tel inputtypes-url inputtypes-email no-inputtypes-datetime inputtypes-date inputtypes-month inputtypes-week inputtypes-time inputtypes-datetime-local inputtypes-number inputtypes-range inputtypes-color postmessage postmessage-structuredclones video no-video-ogg video-h264 no-video-h265 video-webm video-vp9 no-video-hls no-video-av1 webgl websockets cssanimations backgroundsize borderimage borderradius boxshadow flexbox fontface generatedcontent cssgradients hsla multiplebgs opacity cssreflections rgba textshadow csstransforms supports csstransforms3d csstransitions localstorage sessionstorage no-websqldatabase svgclippaths inlinesvg smil webworkers" lang="en-AU" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" data-useragent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="max-image-preview:large">
    <link rel="stylesheet" href="{{ asset('frontend/gallery/css/main.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <style>
        .thumbnail {
            border: 2px solid transparent;
            cursor: pointer;
            transition: border 0.3s ease;
            border-radius: 4px;
        }



        .thumbnail.active-thumb {
            border: 3px solid #c50a21;
            /* or any color you prefer */
        }

        @media (max-width: 480px) {
            .thumbnail {
                height: 80px;
            }

        }

        p {
            font-size: 16px;
        }
    </style>
    <title>TIM INTERNATIONAL</title>
</head>

<body class="wp-singular page-template page-template-100-width page-template-100-width-php page page-id-187 wp-theme-Avada wp-child-theme-Avada-child tribe-js awb-no-sidebars fusion-image-hovers fusion-pagination-sizing fusion-button_type-flat fusion-button_span-no fusion-button_gradient-linear avada-image-rollover-circle-yes avada-image-rollover-yes avada-image-rollover-direction-left fusion-body ltr fusion-sticky-header no-mobile-slidingbar no-mobile-totop avada-has-rev-slider-styles fusion-disable-outline fusion-sub-menu-fade mobile-logo-pos-left layout-wide-mode avada-has-boxed-modal-shadow-none layout-scroll-offset-full avada-has-zero-margin-offset-top fusion-top-header menu-text-align-center mobile-menu-design-modern fusion-show-pagination-text fusion-header-layout-v1 avada-responsive avada-footer-fx-none avada-menu-highlight-style-textcolor fusion-search-form-clean fusion-main-menu-search-overlay fusion-avatar-circle avada-dropdown-styles avada-blog-layout-large avada-blog-archive-layout-large avada-ec-not-100-width avada-ec-meta-layout-sidebar avada-header-shadow-no avada-menu-icon-position-left avada-has-megamenu-shadow avada-has-header-100-width avada-has-pagetitle-bg-parallax avada-has-breadcrumb-mobile-hidden avada-has-titlebar-bar_and_content avada-header-border-color-full-transparent avada-has-pagination-width_height avada-flyout-menu-direction-fade avada-ec-views-v2 fusion-no-touch do-animate" data-awb-post-id="187" style="--viewportWidth: 1366;" cz-shortcut-listen="true">

    <div id="boxed-wrapper">
        <div id="wrapper" class="fusion-wrapper">

            @include('frontend.header')

            <div class="gallery-section" style="margin-top: 100px;">
                <h2 class="gallery-heading">GALLERY</h2>
                <p class="gallery-description">
                    {!! $gallery->long_description ?? 'No Description' !!}
                </p>


                @php
                $images = json_decode($gallery->images, true);
                $firstImage = $images[0] ?? null;
                @endphp

                <div class="main-image-wrapper">
                    <button class="arrow left"><i class="fas fa-chevron-left"></i></button>
                    <img class="main-image" src="{{ $firstImage ? asset('storage/' . $firstImage) : '' }}" alt="Main Car">
                    <button class="arrow right"><i class="fas fa-chevron-right"></i></button>
                </div>

                @php
                $images = array_reverse(json_decode($gallery->images, true));
                @endphp

                <div class="thumbnail-carousel owl-carousel owl-theme">
                    @foreach($images as $image)
                    <div class="item">
                        <img src="{{ asset('storage/' . $image) }}" class="thumbnail" alt="thumbnail">
                    </div>
                    @endforeach
                </div>


                <p class="gallery-description">
                    {!! $gallery->short_description ?? 'No Description' !!}
                </p>
            </div>

            @include('frontend.footer')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            const mainImage = document.querySelector(".main-image");
            const owl = $('.thumbnail-carousel');

            owl.owlCarousel({
                items: 4,
                margin: 10,
                nav: false,
                dots: false,
                loop: true,
                onInitialized: updateMainImageFromCarousel,
                onTranslated: updateMainImageFromCarousel
            });

            // Custom nav buttons
            $('.arrow.left').click(function() {
                owl.trigger('prev.owl.carousel');
            });

            $('.arrow.right').click(function() {
                owl.trigger('next.owl.carousel');
            });

            // Click on thumbnail updates main image and active class
            $(document).on('click', '.thumbnail', function() {
                const src = $(this).attr('src');
                mainImage.src = src;

                $('.thumbnail').removeClass('active-thumb');
                $(this).addClass('active-thumb');
            });

            // Set main image based on first visible thumbnail
            function updateMainImageFromCarousel() {
                const current = owl.find('.owl-item.active').first().find('img.thumbnail').attr('src');
                if (current) {
                    mainImage.src = current;

                    $('.thumbnail').removeClass('active-thumb');
                    $('.thumbnail').each(function() {
                        if ($(this).attr('src') === current) {
                            $(this).addClass('active-thumb');
                        }
                    });
                }
            }

            // Initialize main image
            updateMainImageFromCarousel();
        });
    </script>

</body>

</html>