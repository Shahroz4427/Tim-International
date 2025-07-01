<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="max-image-preview:large">
    <link rel="stylesheet" href="{{ asset('frontend/css/gallery.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/global.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
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
                if (empty($images)) {
                $images = [
                'https://placehold.co/600x400?text=Image+1',
                'https://placehold.co/600x400?text=Image+2',
                'https://placehold.co/600x400?text=Image+3',
                'https://placehold.co/600x400?text=Image+4',
                'https://placehold.co/600x400?text=Image+5',
                ];
                }
                $firstImage = $images[0];
                @endphp

                <div class="main-image-wrapper">
                    <button class="arrow left"><i class="fas fa-chevron-left"></i></button>
                    <img class="main-image" src="{{ Str::startsWith($firstImage, 'http') ? $firstImage : asset('storage/' . $firstImage) }}" alt="Main Car">
                    <button class="arrow right"><i class="fas fa-chevron-right"></i></button>
                </div>

                @php
                $images = array_reverse($images);
                @endphp

                <div class="thumbnail-carousel owl-carousel owl-theme">
                    @foreach($images as $image)
                    <div class="item">
                        <img src="{{ Str::startsWith($image, 'http') ? $image : asset('storage/' . $image) }}" class="thumbnail" alt="thumbnail">
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
    <script src="{{ asset('frontend/js/global.js') }}"></script>
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

            $('.arrow.left').click(function() {
                owl.trigger('prev.owl.carousel');
            });

            $('.arrow.right').click(function() {
                owl.trigger('next.owl.carousel');
            });

            $(document).on('click', '.thumbnail', function() {
                const src = $(this).attr('src');
                mainImage.src = src;

                $('.thumbnail').removeClass('active-thumb');
                $(this).addClass('active-thumb');
            });

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

            updateMainImageFromCarousel();
        });
    </script>

</body>

</html>