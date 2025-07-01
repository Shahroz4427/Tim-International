<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="max-image-preview:large">
    <link rel="stylesheet" href="{{ asset('frontend/css/blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/global.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <title>TIM International</title>
</head>

<body class="wp-singular post-template-default single single-post postid-1913 single-format-standard wp-theme-Avada wp-child-theme-Avada-child tribe-js awb-no-sidebars fusion-image-hovers fusion-pagination-sizing fusion-button_type-flat fusion-button_span-no fusion-button_gradient-linear avada-image-rollover-circle-yes avada-image-rollover-yes avada-image-rollover-direction-left fusion-body ltr fusion-sticky-header no-mobile-slidingbar no-mobile-totop avada-has-rev-slider-styles fusion-disable-outline fusion-sub-menu-fade mobile-logo-pos-left layout-wide-mode avada-has-boxed-modal-shadow-none layout-scroll-offset-full avada-has-zero-margin-offset-top fusion-top-header menu-text-align-center mobile-menu-design-modern fusion-show-pagination-text fusion-header-layout-v1 avada-responsive avada-footer-fx-none avada-menu-highlight-style-textcolor fusion-search-form-clean fusion-main-menu-search-overlay fusion-avatar-circle avada-dropdown-styles avada-blog-layout-large avada-blog-archive-layout-large avada-ec-not-100-width avada-ec-meta-layout-sidebar avada-header-shadow-no avada-menu-icon-position-left avada-has-megamenu-shadow avada-has-header-100-width avada-has-pagetitle-bg-parallax avada-has-breadcrumb-mobile-hidden avada-has-titlebar-hide avada-header-border-color-full-transparent avada-has-pagination-width_height avada-flyout-menu-direction-fade avada-ec-views-v2 fusion-no-touch do-animate">

    <div id="boxed-wrapper">

        <div id="wrapper" class="fusion-wrapper">
            <div id="home" style="position:relative;top:-1px;"></div>

            @include('frontend.header')

            <main id="main" class="clearfix ">
                <div class="fusion-row" style="margin-top: 100px">

                    <section id="content">
                        <article id="post-1913" class="post post-1913 type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
                            <h1 class="entry-title fusion-post-title">{{ $blog->title }}</h1>
                            <div class="fusion-flexslider flexslider fusion-flexslider-loading post-slideshow fusion-post-slideshow">
                                <ul class="slides">
                                    <li>
                                        <a href="#" data-rel="iLightbox[gallery1913]" title="" data-title="ALMS056DSC_1124" data-caption="" aria-label="ALMS056DSC_1124">
                                            <span class="screen-reader-text">View Larger Image</span>
                                            <img width="2500" height="1667" src="{{ asset('storage/'.$blog->image) }}" class="attachment-full size-full wp-post-image " alt="" decoding="async" fetchpriority="high" sizes="(max-width: 640px) 100vw, 2500px"> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-content">
                              {!! $blog->description !!}
                            </div>
                            <span class="vcard rich-snippet-hidden"><span class="fn"><a href="#" title="Posts by trpagency" rel="author">trpagency</a></span></span><span class="updated rich-snippet-hidden">2024-02-25T11:29:01+00:00</span>
                        </article>
                        <div class="single-navigation clearfix">
                            @if($previous)
                            <a href="{{ route('blog.detail', $previous->id) }}" style="margin-right: 20px; font-weight: bold;" rel="prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" style="vertical-align: middle; margin-right: 5px;" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                </svg>
                                Previous
                            </a>
                            @endif
                            @if($next)
                            <a href="{{ route('blog.detail', $next->id) }}" style="font-weight: bold;" rel="next">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" style="vertical-align: middle; margin-left: 5px;" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </a>
                            @endif
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