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
                         <form role="search" class="searchform fusion-search-form fusion-search-form-clean"  >
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

