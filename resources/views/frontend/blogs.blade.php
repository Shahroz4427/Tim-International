<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="max-image-preview:large" />
    <link rel="stylesheet" href="{{ asset('frontend/css/blogs.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/global.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <title>TIM INTERNATIONAL</title>
</head>

<body
    class="wp-singular page-template page-template-100-width page-template-100-width-php page page-id-115 wp-theme-Avada wp-child-theme-Avada-child tribe-js awb-no-sidebars fusion-image-hovers fusion-pagination-sizing fusion-button_type-flat fusion-button_span-no fusion-button_gradient-linear avada-image-rollover-circle-yes avada-image-rollover-yes avada-image-rollover-direction-left fusion-body ltr fusion-sticky-header no-mobile-slidingbar no-mobile-totop avada-has-rev-slider-styles fusion-disable-outline fusion-sub-menu-fade mobile-logo-pos-left layout-wide-mode avada-has-boxed-modal-shadow-none layout-scroll-offset-full avada-has-zero-margin-offset-top fusion-top-header menu-text-align-center mobile-menu-design-modern fusion-show-pagination-text fusion-header-layout-v1 avada-responsive avada-footer-fx-none avada-menu-highlight-style-textcolor fusion-search-form-clean fusion-main-menu-search-overlay fusion-avatar-circle avada-dropdown-styles avada-blog-layout-large avada-blog-archive-layout-large avada-ec-not-100-width avada-ec-meta-layout-sidebar avada-header-shadow-no avada-menu-icon-position-left avada-has-megamenu-shadow avada-has-header-100-width avada-has-pagetitle-bg-parallax avada-has-breadcrumb-mobile-hidden avada-has-titlebar-hide avada-header-border-color-full-transparent avada-has-pagination-width_height avada-flyout-menu-direction-fade avada-ec-views-v2 fusion-no-touch do-animate"
    data-awb-post-id="115"
    style="--viewportWidth: 1366;"
    cz-shortcut-listen="true">
    <div id="boxed-wrapper">
        <div id="wrapper" class="fusion-wrapper">
            @include('frontend.header')

            <main id="main" class="clearfix width-100" style="margin-top:100px;min-height: 100vh;">
                <div class="fusion-title title fusion-title-1 fusion-sep-none fusion-title-center fusion-title-text fusion-title-size-one fusion-animated" style="--awb-margin-bottom: 50px; visibility: visible; animation-duration: 1s; animation-delay: 0.1s;" data-animationtype="fadeIn" data-animationduration="1.0" data-animationdelay="0.1" data-animationoffset="top-into-view">
                    <h1 class="title-heading-center" style="margin:0;text-transform:uppercase;">Blogs</h1>
                </div>
                <div class="custom-psalm-section">
                    @if($blogs->isEmpty())
                    <div style="min-height: 60vh; display: flex; justify-content: center; align-items: center; width: 100%;">
                        <h2 style="margin: 0; font-size: 2rem; color: #555; text-transform: uppercase; font-weight: lighter !important;">No Blogs Available</h2>
                    </div>
                    @else
                    <div class="psalm-container">
                        @foreach($blogs as $blog)
                        <a href="{{ route('blog.detail', $blog->id) }}">
                            <div class="psalm-card">
                                <div class="psalm-image-container">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Psalm Image" class="psalm-image">
                                </div>
                                <div class="psalm-content">
                                    <p class="psalm-text">{{ $blog->title }}</p>
                                    <p class="psalm-date">{{ $blog->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @endif
                    </div>
                </div>
            </main>

            @include('frontend.footer')
        </div>
    </div>
    <script  src="{{ asset('frontend/js/global.js') }}"></script>
</body>

</html>