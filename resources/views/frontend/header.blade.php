 <style>
     body {
         font-family: "Open Sans", Arial, Helvetica, sans-serif !important;
     }

     /*! CSS Used from: http://127.0.0.1:8000/home/css/main.css */
     @media all {
         ul {
             box-sizing: border-box;
         }

         .screen-reader-text {
             border: 0;
             clip-path: inset(50%);
             height: 1px;
             margin: -1px;
             overflow: hidden;
             padding: 0;
             position: absolute;
             width: 1px;
             word-wrap: normal !important;
         }

         .screen-reader-text:focus {
             background-color: #ddd;
             clip-path: none;
             color: #444;
             display: block;
             font-size: 1em;
             height: auto;
             left: 5px;
             line-height: normal;
             padding: 15px 23px 14px;
             text-decoration: none;
             top: 5px;
             width: auto;
             z-index: 100000;
         }

         .fusion-header-wrapper {
             z-index: 999 !important;
         }

         * {
             box-sizing: border-box;
         }

         input[type=search],
         input[type=submit] {
             -webkit-appearance: none;
             -webkit-border-radius: 0;
         }

         img {
             border-style: none;
             vertical-align: top;
             max-width: 100%;
             height: auto;
         }

         a {
             text-decoration: none;
         }

         input {
             font-family: var(--body_typography-font-family, inherit);
             vertical-align: middle;
             color: var(--body_typography-color);
         }

         form {
             margin: 0;
             padding: 0;
             border-style: none;
         }

         a,
         a:after,
         a:before {
             transition-property: color, background-color, border-color;
             transition-duration: .2s;
             transition-timing-function: linear;
         }

         .s {
             float: none;
         }

         .searchform .fusion-search-form-content {
             display: flex;
             align-items: center;
             overflow: hidden;
             width: 100%;
         }

         .searchform .fusion-search-form-content .fusion-search-field {
             flex-grow: 1;
         }

         .searchform .fusion-search-form-content .fusion-search-field input {
             background-color: #fff;
             border: 1px solid #d2d2d2;
             color: #747474;
             font-size: 13px;
             padding: 8px 15px;
             height: 33px;
             width: 100%;
             box-sizing: border-box;
             margin: 0;
             outline: 0;
         }

         .searchform .fusion-search-form-content .fusion-search-button input[type=submit] {
             background: #000;
             border: none;
             border-radius: 0;
             color: #fff;
             font-size: 1em;
             height: 33px;
             line-height: 33px;
             margin: 0;
             padding: 0;
             width: 33px;
             text-indent: 0;
             cursor: pointer;
             font-family: awb-icons;
             font-weight: 400;
             text-shadow: none;
             -webkit-font-smoothing: antialiased;
             transition: all .2s;
         }

         .fusion-search-form-clean .searchform:not(.fusion-search-form-classic) .fusion-search-form-content {
             position: relative;
         }

         .fusion-search-form-clean .searchform:not(.fusion-search-form-classic) .fusion-search-button {
             position: absolute;
         }

         .fusion-search-form-clean .searchform:not(.fusion-search-form-classic) .fusion-search-button input[type=submit] {
             background-color: transparent;
             color: #aaa9a9;
         }

         .fusion-main-menu-search-overlay .fusion-main-menu>.fusion-menu {
             display: flex;
             flex-wrap: wrap;
             transition: opacity .8s cubic-bezier(.8, 0, .25, 1), transform .8s cubic-bezier(.8, 0, .25, 1);
         }

         .fusion-main-menu-search-overlay .fusion-main-menu>.fusion-overlay-search {
             display: flex;
             visibility: hidden;
             align-items: center;
             opacity: 0;
             position: absolute;
             top: 50%;
             left: 50%;
             transform: translate(-50%, -150%);
             width: 100%;
             transition: opacity .8s cubic-bezier(.8, 0, .25, 1), transform .8s cubic-bezier(.8, 0, .25, 1);
         }

         .fusion-main-menu-search-overlay .fusion-main-menu>.fusion-overlay-search .fusion-search-form {
             flex-grow: 2;
         }

         .fusion-main-menu-search-overlay .fusion-main-menu>.fusion-overlay-search .fusion-close-search {
             overflow: hidden;
             position: relative;
             display: inline-block;
         }

         .fusion-main-menu-search-overlay .fusion-main-menu>.fusion-overlay-search .fusion-close-search:after,
         .fusion-main-menu-search-overlay .fusion-main-menu>.fusion-overlay-search .fusion-close-search:before {
             content: "";
             position: absolute;
             top: 50%;
             left: 0;
             height: 2px;
             width: 100%;
             margin-top: -1px;
         }

         .fusion-main-menu-search-overlay .fusion-main-menu>.fusion-overlay-search .fusion-close-search:before {
             transform: rotate(45deg);
         }

         .fusion-main-menu-search-overlay .fusion-main-menu>.fusion-overlay-search .fusion-close-search:after {
             transform: rotate(-45deg);
         }

         .fusion-overlay-search {
             position: absolute;
             opacity: 0;
         }

         .fusion-row {
             margin: 0 auto;
         }

         .fusion-row:after,
         .fusion-row:before {
             content: " ";
             display: table;
         }

         .fusion-row:after {
             clear: both;
         }

         .screen-reader-text {
             border: 0;
             clip: rect(1px, 1px, 1px, 1px);
             -webkit-clip-path: inset(50%);
             clip-path: inset(50%);
             height: 1px;
             margin: -1px;
             overflow: hidden;
             padding: 0;
             position: absolute !important;
             width: 1px;
             word-wrap: normal !important;
         }

         .screen-reader-text:focus {
             background-color: #fff;
             border-radius: 3px;
             box-shadow: 0 0 2px 2px rgba(0, 0, 0, .6);
             clip: auto !important;
             -webkit-clip-path: none;
             clip-path: none;
             color: #333;
             display: block;
             font-size: 1rem;
             font-weight: 700;
             height: auto;
             left: 5px;
             line-height: normal;
             padding: 15px 23px 14px;
             text-decoration: none;
             top: 5px;
             width: auto;
             z-index: 100000;
         }

         .fusion-disable-outline input {
             outline: 0;
         }
     }

     [class*=" awb-icon-"] {
         font-family: awb-icons !important;
         speak: never;
         font-style: normal;
         font-weight: 400;
         font-variant: normal;
         text-transform: none;
         line-height: 1;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
     }

     .awb-icon-bars:before {
         content: "\f0c9";
     }

     a:hover {
         color: var(--link_hover_color);
     }

     .fusion-header-wrapper {
         position: fixed;
         /* Changed from relative to fixed */
         top: 0;
         left: 0;
         right: 0;
         z-index: 10011;
         width: 100%;
         background: #fff;
         /* Add background color so content doesn't show through */
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
         /* Optional: adds shadow when scrolled */
         transition: all 0.3s ease;
         /* Smooth transition for any style changes */

     }

     .fusion-header-sticky-height {
         display: none;
     }

     .fusion-header {
         padding-left: 30px;
         padding-right: 30px;
         backface-visibility: hidden;
         transition: background-color .25s ease-in-out;
     }

     .fusion-logo {
         display: block;
         float: left;
         max-width: 100%;
     }

     .fusion-logo:after,
     .fusion-logo:before {
         content: " ";
         display: table;
     }

     .fusion-logo:after {
         clear: both;
     }

     .fusion-logo a {
         display: block;
         max-width: 100%;
     }

     .fusion-logo img {
         width: auto;
     }

     .fusion-main-menu {
         float: right;
         position: relative;
         z-index: 200;
         overflow: hidden;
     }

     .fusion-header-v1 .fusion-main-menu:hover {
         overflow: visible;
     }

     .fusion-main-menu>ul>li {
         padding-right: 45px;
     }

     .fusion-main-menu>ul>li:last-child {
         padding-right: 0;
     }

     .fusion-main-menu>ul>li>a {
         display: flex;
         align-items: center;
         line-height: 1;
         -webkit-font-smoothing: subpixel-antialiased;
     }

     .fusion-main-menu ul {
         list-style: none;
         margin: 0;
         padding: 0;
     }

     .fusion-main-menu ul a {
         display: block;
         box-sizing: content-box;
     }

     .fusion-main-menu li {
         float: left;
         margin: 0;
         padding: 0;
         position: relative;
         cursor: pointer;
     }

     .fusion-mobile-nav-holder {
         display: none;
         clear: both;
         color: #333;
     }

     .fusion-mobile-nav-holder .menu-text {
         -webkit-font-smoothing: auto;
     }

     .fusion-mobile-nav-holder ul {
         list-style: none;
         margin: 0;
         padding: 0;
     }

     .fusion-mobile-nav-holder>ul {
         display: none;
         list-style: none;
         margin: 0;
         padding: 0;
         border-left: 1px solid transparent;
         border-right: 1px solid transparent;
         border-bottom: 1px solid transparent;
     }

     .fusion-mobile-menu-text-align-center .fusion-mobile-nav-item a {
         justify-content: center;
     }

     .fusion-mobile-menu-design-modern .fusion-mobile-nav-holder>ul {
         border: none;
         border-top: 1px solid transparent;
     }

     .fusion-mobile-menu-design-modern .fusion-header>.fusion-row {
         position: relative;
     }

     .fusion-mobile-nav-item {
         position: relative;
         font-size: 12px;
         line-height: normal;
     }

     .fusion-mobile-nav-item a {
         color: #333;
         padding: 0 12px;
         font-size: 12px;
         display: flex;
         align-items: center;
         border-bottom: 1px solid transparent;
     }

     .fusion-mobile-menu-icons {
         display: none;
         position: relative;
         top: 0;
         right: 0;
         vertical-align: middle;
         text-align: right;
     }

     .fusion-mobile-menu-icons a {
         float: right;
         font-size: 21px;
         margin-left: 20px;
     }

     body:not(.fusion-header-layout-v6) .fusion-header {
         -webkit-transform: translate3d(0, 0, 0);
         -moz-transform: none;
     }

     .fusion-top-header.menu-text-align-center .fusion-main-menu>ul>li>a {
         justify-content: center;
     }

     .fusion-header-wrapper .fusion-row {
         padding-left: var(--header_padding-left);
         padding-right: var(--header_padding-right);
     }

     .fusion-header .fusion-row {
         padding-top: var(--header_padding-top);
         padding-bottom: var(--header_padding-bottom);
     }

     .layout-wide-mode.avada-has-header-100-width .fusion-header-wrapper .fusion-row {
         max-width: 100%;
     }

     .fusion-top-header .fusion-header {
         background-color: var(--header_bg_color);
     }

     .fusion-header-wrapper .fusion-row {
         max-width: var(--site_width);
     }

     .fusion-header .fusion-logo {
         margin: var(--logo_margin-top) var(--logo_margin-right) var(--logo_margin-bottom) var(--logo_margin-left);
     }

     .fusion-main-menu>ul>li {
         padding-right: var(--nav_padding);
     }

     .fusion-main-menu>ul>li>a {
         border-color: transparent;
     }

     .fusion-main-menu>ul>li>a:not(.fusion-logo-link):not(.awb-icon-sliding-bar):hover {
         border-color: var(--menu_hover_first_color);
     }

     .fusion-main-menu>ul>li>a:not(.fusion-logo-link):hover {
         color: var(--menu_hover_first_color);
     }

     body:not(.fusion-header-layout-v6) .fusion-main-menu>ul>li>a {
         height: var(--nav_height);
     }

     .fusion-main-menu>ul>li>a {
         font-family: var(--nav_typography-font-family);
         font-weight: var(--nav_typography-font-weight);
         font-size: var(--nav_typography-font-size);
         letter-spacing: var(--nav_typography-letter-spacing);
         text-transform: var(--nav_typography-text-transform);
         font-style: var(--nav_typography-font-style, normal);
     }

     .fusion-main-menu>ul>li>a {
         color: var(--nav_typography-color);
     }

     .fusion-mobile-menu-icons {
         margin-top: var(--mobile_menu_icons_top_margin);
     }

     .fusion-mobile-menu-icons a {
         color: var(--mobile_menu_toggle_color);
     }

     .fusion-mobile-menu-icons a:after,
     .fusion-mobile-menu-icons a:before {
         color: var(--mobile_menu_toggle_color);
     }

     body:not(.mobile-menu-design-flyout) .fusion-mobile-nav-item a {
         height: var(--mobile_menu_nav_height);
         background-color: var(--mobile_menu_background_color);
         border-color: var(--mobile_menu_border_color);
     }

     body:not(.mobile-menu-design-flyout) .fusion-mobile-nav-item a:hover {
         background-color: var(--mobile_menu_hover_color);
     }

     .fusion-mobile-nav-holder>ul {
         border-color: var(--mobile_menu_border_color);
     }

     .fusion-mobile-nav-holder>ul li a {
         font-family: var(--mobile_menu_typography-font-family);
         font-weight: var(--mobile_menu_typography-font-weight);
         font-style: var(--mobile_menu_typography-font-style, normal);
     }

     .fusion-mobile-nav-holder>ul>li.fusion-mobile-nav-item>a {
         font-size: var(--mobile_menu_typography-font-size);
         letter-spacing: var(--mobile_menu_typography-letter-spacing);
         text-transform: var(--mobile_menu_typography-text-transform);
     }

     .fusion-mobile-menu-design-modern .fusion-mobile-nav-holder>ul {
         border-color: var(--mobile_menu_border_color);
     }

     .fusion-mobile-nav-item a {
         color: var(--mobile_menu_typography-color);
         font-size: var(--mobile_menu_typography-font-size);
         line-height: var(--mobile_menu_typography-line-height);
         letter-spacing: var(--mobile_menu_typography-letter-spacing);
         text-transform: var(--mobile_menu_typography-text-transform);
     }

     .fusion-mobile-nav-item a:hover {
         color: var(--mobile_menu_font_hover_color);
     }

     .fusion-mobile-nav-item a:before {
         color: var(--mobile_menu_typography-color);
     }

     .searchform .fusion-search-form-content .fusion-search-button input[type=submit],
     .searchform .fusion-search-form-content .fusion-search-field input,
     input.s {
         height: var(--form_input_height);
         padding-top: 0;
         padding-bottom: 0;
     }

     .searchform .fusion-search-form-content .fusion-search-button input[type=submit] {
         width: var(--form_input_height);
     }

     .searchform .fusion-search-form-content .fusion-search-button input[type=submit] {
         line-height: var(--form_input_height);
     }

     input.s {
         background-color: var(--form_bg_color);
         font-size: var(--form_text_size);
         color: var(--form_text_color);
     }

     input.s:focus {
         border-color: var(--form_focus_border_color);
     }

     .searchform .fusion-search-form-content .fusion-search-field input {
         background-color: var(--form_bg_color);
         font-size: var(--form_text_size);
     }

     .fusion-search-form-clean .searchform:not(.fusion-search-form-classic) .fusion-search-form-content .fusion-search-button input[type=submit] {
         font-size: var(--form_text_size);
         color: var(--form_text_color);
     }

     .fusion-search-form-clean .searchform:not(.fusion-search-form-classic) .fusion-search-form-content .fusion-search-button input[type=submit]:focus {
         border-color: var(--form_focus_border_color);
     }

     .searchform .fusion-search-form-content .fusion-search-field input {
         color: var(--form_text_color);
     }

     .searchform .fusion-search-form-content .fusion-search-field input:focus {
         border-color: var(--form_focus_border_color);
     }

     .searchform .fusion-search-form-content .fusion-search-field input,
     input.s {
         border-width: var(--form_border_width-top) var(--form_border_width-right) var(--form_border_width-bottom) var(--form_border_width-left);
         border-color: var(--form_border_color);
         border-radius: var(--form_border_radius);
     }

     .fusion-main-menu-search-overlay .fusion-overlay-search .fusion-search-spacer {
         width: calc((var(--form_input_height)) * .4);
     }

     .fusion-main-menu-search-overlay .fusion-overlay-search .fusion-close-search {
         width: var(--form_text_size);
         height: var(--form_text_size);
     }

     .fusion-main-menu-search-overlay .fusion-overlay-search .fusion-close-search:after,
     .fusion-main-menu-search-overlay .fusion-overlay-search .fusion-close-search:before {
         background-color: var(--nav_typography-color);
     }

     .fusion-main-menu-search-overlay .fusion-overlay-search .fusion-close-search:hover:after,
     .fusion-main-menu-search-overlay .fusion-overlay-search .fusion-close-search:hover:before {
         background-color: var(--menu_hover_first_color);
     }

     body a,
     body a:after,
     body a:before {
         color: var(--link_color);
     }

     .fusion-search-form-clean .searchform:not(.fusion-search-form-classic) .fusion-search-form-content .fusion-search-field input {
         padding-left: var(--form_input_height);
     }

     .fusion-header {
         --header_bg_color: var(--awb-color7);
         --archive_header_bg_color: var(--awb-color7);
     }

     .fusion-header-wrapper {
         --header_border_color: rgba(226, 226, 226, 0);
     }

     .fusion-header-wrapper {
         --header_sticky_bg_color: var(--awb-color7);
     }

     .fusion-main-menu {
         --header_sticky_menu_color: var(--awb-color1);
         --header_sticky_nav_font_size: 14px;
         --nav_height: 114px;
         --mobile_nav_padding: 25px;
         --menu_text_align: center;
         --menu_thumbnail_size-width: 26px;
         --menu_thumbnail_size-height: 14px;
     }

     .fusion-main-menu {
         --header_sticky_nav_padding: 48px;
     }

     .fusion-header {
         --top-bar-height: calc(48px / 2);
     }

     .fusion-logo {
         --logo_margin-top: 15px !important;
         --logo_margin-bottom: 15px !important;
         --logo_margin-left: 0px;
         --logo_margin-right: 0px;
     }

     .fusion-clearfix {
         clear: both;
     }

     .fusion-clearfix:after,
     .fusion-clearfix:before {
         content: " ";
         display: table;
     }

     .fusion-clearfix:after {
         clear: both;
     }

     @media only screen and (max-width: 800px) {
         .fusion-body .fusion-header-wrapper .fusion-header {
             background-color: var(--mobile_header_bg_color);
         }
     }

     @media only screen and (max-width: 800px) {
         .fusion-mobile-menu-design-modern.fusion-header-v1 .fusion-header {
             padding-top: 20px;
             padding-bottom: 20px;
         }

         .fusion-mobile-menu-design-modern.fusion-header-v1 .fusion-header .fusion-row {
             width: 100%;
         }

         .fusion-mobile-menu-design-modern.fusion-header-v1 .fusion-logo {
             margin: 0 !important;
         }

         .fusion-mobile-menu-design-modern.fusion-header-v1 .fusion-mobile-nav-holder {
             padding-top: 20px;
             margin-left: -30px;
             margin-right: -30px;
             margin-bottom: calc(-20px - var(--header_padding-bottom));
         }

         .fusion-mobile-menu-design-modern.fusion-header-v1 .fusion-mobile-nav-holder>ul {
             display: block;
         }

         .fusion-mobile-menu-design-modern.fusion-header-v1 .fusion-mobile-menu-icons {
             display: block;
         }

         .fusion-header .fusion-row {
             padding-left: 0;
             padding-right: 0;
         }

         .fusion-header-wrapper .fusion-row {
             padding-left: 0;
             padding-right: 0;
             max-width: 100%;
         }

         .fusion-mobile-menu-design-modern.fusion-header-v1 .fusion-main-menu {
             display: none;
         }
     }

     @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait) {
         .fusion-header .fusion-row {
             padding-left: 0 !important;
             padding-right: 0 !important;
         }

         .avada-responsive:not(.rtl):not(.avada-menu-highlight-style-background) .fusion-header-v1 .fusion-main-menu>ul>li {
             padding-right: var(--mobile_nav_padding);
         }
     }

     @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) {
         .avada-responsive:not(.rtl) .fusion-header-v1 .fusion-main-menu>ul>li {
             padding-right: var(--mobile_nav_padding);
         }
     }

     /*! CSS Used from: Embedded */
     @media all {
         * {
             box-sizing: border-box;
         }

         a {
             text-decoration: none;
         }

         a,
         a:after,
         a:before {
             transition-property: color, background-color, border-color;
             transition-duration: .2s;
             transition-timing-function: linear;
         }

         .fusion-row {
             margin: 0 auto;
         }

         .fusion-row:after,
         .fusion-row:before {
             content: " ";
             display: table;
         }

         .fusion-row:after {
             clear: both;
         }
     }

     a:hover {
         color: var(--link_hover_color);
     }

     body a,
     body a:after,
     body a:before {
         color: var(--link_color);
     }

     /*! CSS Used fontfaces */
     @font-face {
         font-family: "awb-icons";
         src: url('/awb-icons.woff') format('woff'), url('/awb-icons.ttf') format('truetype'), url('/awb-icons.svg#awb-icons') format('svg');
         font-weight: normal;
         font-style: normal;
         font-display: block;
     }

     .fusion-menu .active>a {
         color: #c50a21;
         /* or any highlight */

     }

     
 </style>

 <header class="fusion-header-wrapper">
     <div class="fusion-header-v1 fusion-logo-alignment fusion-logo-left fusion-sticky-menu- fusion-sticky-logo- fusion-mobile-logo- fusion-mobile-menu-design-modern">
         <div class="fusion-header-sticky-height" style="height: 114px; overflow: visible;"></div>
         <div class="fusion-header" style="height: 114px; overflow: visible; top: 0px;">
             <div class="fusion-row">
                 <div class="fusion-logo" data-margin-top="15px" data-margin-bottom="15px" data-margin-left="0px" data-margin-right="0px">
                     <a class="fusion-logo-link" href="{{ route('home') }}">
                         <img src="{{ asset('white-logo.png') }}" width="291" height="58" style="max-height: 68px; height: auto;" alt="TIM Internation" class="fusion-standard-logo">
                     </a>
                 </div>
                 <nav class="fusion-main-menu" aria-label="Main Menu">
                     <div class="fusion-overlay-search" style="max-width: 528.547px;">
                         <form role="search" class="searchform fusion-search-form fusion-search-form-clean" method="get" action="https://ggclassiccars.com/">
                             <div class="fusion-search-form-content">
                                 <div class="fusion-search-field search-field">
                                     <label>
                                         <span class="screen-reader-text">Search for:</span>
                                         <input type="search" value="" name="s" class="s" placeholder="Search..." required="" aria-required="true" aria-label="Search...">
                                     </label>
                                 </div>
                                 <div class="fusion-search-button search-button">
                                     <input type="submit" class="fusion-search-submit searchsubmit" aria-label="Search" value="">
                                 </div>
                             </div>
                         </form>
                         <div class="fusion-search-spacer"></div>
                         <a href="#" role="button" aria-label="Close Search" class="fusion-close-search"></a>
                     </div>
                     <ul id="menu-menu" class="fusion-menu">
                         <li class="menu-item {{ request()->routeIs('inventory') ? 'active' : '' }}">
                             <a href="{{ route('inventory') }}" class="fusion-textcolor-highlight">
                                 <span class="menu-text">Inventory</span>
                             </a>
                         </li>

                         <li class="menu-item {{ request()->routeIs('services') ? 'active' : '' }}">
                             <a href="{{ route('services') }}" class="fusion-textcolor-highlight">
                                 <span class="menu-text">Services</span>
                             </a>
                         </li>

                         <li class="menu-item {{ request()->routeIs('gallery') ? 'active' : '' }}">
                             <a href="{{ route('gallery') }}" class="fusion-textcolor-highlight">
                                 <span class="menu-text">Gallery</span>
                             </a>
                         </li>

                         <li class="menu-item {{ request()->routeIs('blogs') ? 'active' : '' }}">
                             <a href="{{ route('blogs') }}" class="fusion-textcolor-highlight">
                                 <span class="menu-text">Blog</span>
                             </a>
                         </li>

                         <li class="menu-item {{ request()->routeIs('about') ? 'active' : '' }}">
                             <a href="{{ route('about') }}" class="fusion-textcolor-highlight">
                                 <span class="menu-text">About</span>
                             </a>
                         </li>

                         <li class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                             <a href="{{ route('contact') }}" class="fusion-textcolor-highlight">
                                 <span class="menu-text">Contact</span>
                             </a>
                         </li>
                     </ul>
                 </nav>
                 <div class="fusion-mobile-menu-icons">
                     <a href="#" class="fusion-icon awb-icon-bars" aria-label="Toggle mobile menu" aria-expanded="false" aria-controls="mobile-menu-menu"></a>
                 </div>
                 <nav class="fusion-mobile-nav-holder fusion-mobile-menu-text-align-center" aria-label="Main Menu Mobile" style="display: none;">
                     <ul id="mobile-menu-menu" class="fusion-menu">
                         <li id="mobile-menu-item-71" class="fusion-mobile-nav-item" data-item-id="71">
                             <a href="{{ route('inventory') }}" class="fusion-textcolor-highlight">
                                <span class="menu-text">Inventory</span>
                            </a>
                         </li>
                         <li id="mobile-menu-item-4524" class="fusion-mobile-nav-item" data-item-id="4524">
                             <a href="{{ route('services') }}" class="fusion-textcolor-highlight">
                                <span class="menu-text">Services</span>
                            </a>
                         </li>
                         <li id="mobile-menu-item-122" class="fusion-mobile-nav-item" data-item-id="122">
                             <a href="{{ route('gallery') }}" class="fusion-textcolor-highlight">
                                <span class="menu-text">Gallery</span>
                            </a>
                         </li>
                         <li id="mobile-menu-item-193" class="fusion-mobile-nav-item" data-item-id="193">
                             <a href="{{ route('blogs') }}" class="fusion-textcolor-highlight">
                                <span class="menu-text">Blog</span>
                            </a>
                         </li>
                         <li id="mobile-menu-item-194" class="fusion-mobile-nav-item" data-item-id="194">
                             <a href="{{ route('about') }}" class="fusion-textcolor-highlight">
                                <span class="menu-text">About</span>
                            </a>
                         </li>
                         <li id="mobile-menu-item-194" class="fusion-mobile-nav-item" data-item-id="194">
                             <a href="{{ route('contact') }}" class="fusion-textcolor-highlight">
                                <span class="menu-text">Contact</span>
                            </a>
                         </li>
                     </ul>
                 </nav>
             </div>
         </div>
     </div>
     <div class="fusion-clearfix"></div>
 </header>

 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const toggleBtn = document.querySelector('.fusion-icon.awb-icon-bars');
         const mobileNav = document.querySelector('.fusion-mobile-nav-holder');

         if (toggleBtn && mobileNav) {
             toggleBtn.addEventListener('click', function(e) {
                 e.preventDefault();
                 const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';

                 toggleBtn.setAttribute('aria-expanded', !isExpanded);
                 mobileNav.style.display = isExpanded ? 'none' : 'block';
             });
         }
     });
 </script>