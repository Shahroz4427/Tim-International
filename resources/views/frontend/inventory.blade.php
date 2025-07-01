<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="max-image-preview:large">
    <link rel="stylesheet" href="{{ asset('frontend/css/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/inventory.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <title>TIM INTERNATIONAL</title>
</head>

<body class="wp-singular page-template page-template-100-width page-template-100-width-php page page-id-9 wp-theme-Avada wp-child-theme-Avada-child tribe-js awb-no-sidebars fusion-image-hovers fusion-pagination-sizing fusion-button_type-flat fusion-button_span-no fusion-button_gradient-linear avada-image-rollover-circle-yes avada-image-rollover-yes avada-image-rollover-direction-left fusion-body ltr fusion-sticky-header no-mobile-slidingbar no-mobile-totop avada-has-rev-slider-styles fusion-disable-outline fusion-sub-menu-fade mobile-logo-pos-left layout-wide-mode avada-has-boxed-modal-shadow-none layout-scroll-offset-full avada-has-zero-margin-offset-top fusion-top-header menu-text-align-center mobile-menu-design-modern fusion-show-pagination-text fusion-header-layout-v1 avada-responsive avada-footer-fx-none avada-menu-highlight-style-textcolor fusion-search-form-clean fusion-main-menu-search-overlay fusion-avatar-circle avada-dropdown-styles avada-blog-layout-large avada-blog-archive-layout-large avada-ec-not-100-width avada-ec-meta-layout-sidebar avada-header-shadow-no avada-menu-icon-position-left avada-has-megamenu-shadow avada-has-header-100-width avada-has-pagetitle-bg-parallax avada-has-breadcrumb-mobile-hidden avada-has-titlebar-hide avada-header-border-color-full-transparent avada-has-pagination-width_height avada-flyout-menu-direction-fade avada-ec-views-v2 do-animate fusion-no-touch">
    <div id="boxed-wrapper">
        <div id="wrapper" class="fusion-wrapper">

            @include('frontend.header')

            <main id="main" class="clearfix width-100">
                <div class="fusion-row" style="max-width:100%; margin-top:85px;min-height: 100vh;">
                    <section id="content" class="full-width">
                        <div id="post-9" class="post-9 page type-page status-publish hentry">
                            <span class="entry-title rich-snippet-hidden">Inventory</span><span
                                class="vcard rich-snippet-hidden"><span class="fn"><a
                                        href="#" title="Posts by admin"
                                        rel="author">admin</a></span></span><span
                                class="updated rich-snippet-hidden">2025-02-02T09:37:46+00:00</span>
                            <div class="post-content">
                                <div class="fusion-fullwidth fullwidth-box fusion-builder-row-1 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
                                    style="--awb-border-radius-top-left:0px;--awb-border-radius-top-right:0px;--awb-border-radius-bottom-right:0px;--awb-border-radius-bottom-left:0px;--awb-padding-right-small:20px;--awb-padding-left-small:20px;">
                                    <div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start"
                                        style="max-width:1248px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
                                        <div class="fusion-layout-column fusion_builder_column fusion-builder-column-0 fusion_builder_column_1_1 1_1 fusion-flex-column available_inventory fusion-animated"
                                            style="--awb-bg-size: cover; --awb-width-large: 100%; --awb-margin-top-large: 0px; --awb-spacing-right-large: 4.8%; --awb-margin-bottom-large: 20px; --awb-spacing-left-large: 4.8%; --awb-width-medium: 100%; --awb-order-medium: 0; --awb-spacing-right-medium: 4.8%; --awb-spacing-left-medium: 4.8%; --awb-width-small: 100%; --awb-order-small: 0; --awb-spacing-right-small: 1.92%; --awb-spacing-left-small: 1.92%; visibility: visible; animation-duration: 1s; animation-delay: 0.1s;"
                                            data-animationtype="fadeIn" data-animationduration="1.0"
                                            data-animationdelay="0.1" data-animationoffset="top-into-view">
                                            <div
                                                class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                                                <div class="fusion-title title fusion-title-1 fusion-sep-none fusion-title-center fusion-title-text fusion-title-size-one fusion-animated"
                                                    style="--awb-margin-bottom: 50px; visibility: visible; animation-duration: 1s; animation-delay: 0.1s;"
                                                    data-animationtype="fadeIn" data-animationduration="1.0"
                                                    data-animationdelay="0.1" data-animationoffset="top-into-view">
                                                    <h1 class="title-heading-center"
                                                        style="margin:0;text-transform:uppercase;">
                                                        <strong>Inventory</strong>
                                                    </h1>
                                                </div>
                                                <div class="ggc_autolist_main" id="listings-container" >
                                                    @if($cars->isEmpty())
                                                    <div style="min-height: 60vh; display: flex; justify-content: center; align-items: center; width: 100%;">
                                                        <h2 style="margin: 0; font-size: 2rem; color: #555;">No Cars Available</h2>
                                                    </div>
                                                    @else
                                                    @foreach($cars as $car)
                                                    <div class="ggc_autolist_item" data="">
                                                        <div class="ggc_alimg">
                                                            <a href="{{ route('inventory.detail', ['id' => $car->id]) }}">
                                                                <img style="height: 518px;" width="1085px"
                                                                    decoding="async"
                                                                    src="{{ $car->main_image ? asset('storage/' . $car->main_image) : 'https://placehold.co/1085x518' }}"
                                                                    alt="{{ $car->title ?? 'Car Image' }}">
                                                            </a>
                                                        </div>
                                                        <a href="{{ route('inventory.detail', ['id' => $car->id]) }}">
                                                            <div class="ggc_aldetail">
                                                                <h2 class="ggc_aldetail_title">
                                                                    {{ $car->title ?? 'Car Title' }}
                                                                </h2>
                                                                <div class="clear"></div>

                                                                <div class="ggcal_detail">
                                                                    <p>
                                                                        {!! $car->description ?? 'No description available.' !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>

            @include('frontend.footer')
        </div>
    </div>
    <script  src="{{ asset('frontend/js/global.js') }}"></script>
</body>

</html>