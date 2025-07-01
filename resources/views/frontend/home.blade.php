<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="max-image-preview:large" />
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/global.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <title>TIM INTERNATIONAL</title>
</head>

<body class="home wp-singular page-template page-template-100-width page-template-100-width-php page page-id-2 wp-theme-Avada wp-child-theme-Avada-child tribe-js awb-no-sidebars fusion-image-hovers fusion-pagination-sizing fusion-button_type-flat fusion-button_span-no fusion-button_gradient-linear avada-image-rollover-circle-yes avada-image-rollover-yes avada-image-rollover-direction-left fusion-body ltr fusion-sticky-header no-mobile-slidingbar no-mobile-totop avada-has-rev-slider-styles fusion-disable-outline fusion-sub-menu-fade mobile-logo-pos-left layout-wide-mode avada-has-boxed-modal-shadow-none layout-scroll-offset-full avada-has-zero-margin-offset-top fusion-top-header menu-text-align-center mobile-menu-design-modern fusion-show-pagination-text fusion-header-layout-v1 avada-responsive avada-footer-fx-none avada-menu-highlight-style-textcolor fusion-search-form-clean fusion-main-menu-search-overlay fusion-avatar-circle avada-dropdown-styles avada-blog-layout-large avada-blog-archive-layout-large avada-ec-not-100-width avada-ec-meta-layout-sidebar avada-header-shadow-no avada-menu-icon-position-left avada-has-megamenu-shadow avada-has-header-100-width avada-has-pagetitle-bg-parallax avada-has-breadcrumb-mobile-hidden avada-has-titlebar-hide avada-header-border-color-full-transparent avada-has-pagination-width_height avada-flyout-menu-direction-fade avada-ec-views-v2 do-animate fusion-no-touch">
    <div id="boxed-wrapper">
        <div id="wrapper" class="fusion-wrapper">
            @include('frontend.header')
            <div class="fusion-row" style="max-width: 100%; margin-top:100px">
                <section id="content" class="full-width">
                    <div id="post-2" class="post-2 page type-page status-publish hentry">
                        <span class="entry-title rich-snippet-hidden">Home</span>
                        <span class="vcard rich-snippet-hidden">
                            <span class="fn"><a href="#" title="Posts by admin" rel="author">admin</a></span>
                        </span>
                        <span class="updated rich-snippet-hidden">2025-05-27T06:24:31+00:00</span>
                        <div class="post-content">
                            <div class="banner-container" style="background-image: url('{{ asset('frontend/images/banner.png') }}');"></div>
                            <div
                                class="fusion-fullwidth fullwidth-box fusion-builder-row-2 fusion-flex-container has-pattern-background has-mask-background nonhundred-percent-fullwidth non-hundred-percent-height-scrolling"
                                style="
                                            --awb-border-radius-top-left: 0px;
                                            --awb-border-radius-top-right: 0px;
                                            --awb-border-radius-bottom-right: 0px;
                                            --awb-border-radius-bottom-left: 0px;
                                            --awb-padding-top: 50px;
                                            --awb-padding-bottom: 50px;
                                            --awb-padding-top-small: 50px;
                                            --awb-padding-right-small: 20px;
                                            --awb-padding-bottom-small: 20px;
                                            --awb-padding-left-small: 20px;
                                        ">
                                <div class="fusion-builder-row fusion-row fusion-flex-align-items-center fusion-flex-justify-content-center" style="max-width: 1248px; margin-left: calc(-4% / 2); margin-right: calc(-4% / 2);">
                                    <div
                                        class="fusion-layout-column fusion_builder_column fusion-builder-column-1 fusion_builder_column_3_4 3_4 fusion-flex-column fusion-flex-align-self-center"
                                        style="
                                                    --awb-bg-size: cover;
                                                    --awb-width-large: 75%;
                                                    --awb-margin-top-large: 0px;
                                                    --awb-spacing-right-large: 2.56%;
                                                    --awb-margin-bottom-large: 20px;
                                                    --awb-spacing-left-large: 2.56%;
                                                    --awb-width-medium: 75%;
                                                    --awb-order-medium: 0;
                                                    --awb-spacing-right-medium: 2.56%;
                                                    --awb-spacing-left-medium: 2.56%;
                                                    --awb-width-small: 100%;
                                                    --awb-order-small: 0;
                                                    --awb-spacing-right-small: 1.92%;
                                                    --awb-spacing-left-small: 1.92%;
                                                ">
                                        <div class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                                            <div
                                                class="fusion-text fusion-text-1 fusion-animated home-welcome"
                                                style="
                                                            --awb-content-alignment: center;
                                                            --awb-font-size: 45px;
                                                            --awb-text-transform: uppercase;
                                                            --awb-text-color: var(--awb-color8);
                                                           
                                                            visibility: visible;
                                                            animation-duration: 1s;
                                                            animation-delay: 0.1s;
                                                        "
                                                data-animationtype="fadeInUp"
                                                data-animationduration="1.0"
                                                data-animationdelay="0.1"
                                                data-animationoffset="top-into-view">
                                               
                                                <p class="welcome-text">
                                                    <span style="color: #000000; font-weight: lighter;">
                                                        Welcome to
                                                        <span style="color: #c50a21;">Tim International</span>, classic and vintage cars.
                                                    </span>
                                                </p>

                                            </div>
                                            <div style="display: flex; justify-content: center;">
                                                <div style="text-align: center; padding: 20px;">
                                                    <button onclick="window.location.href='{{ route('inventory') }}'" type="button" class="explore-btn">
                                                        EXPLORE INVENTORY
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="media-gallery-section" style="max-width: 100%;">
                <div class="media-gallery-overlay"></div>
                <div class="media-gallery-content">
                    <h2 class="media-gallery-title">MEDIA GALLERY</h2>
                    <div class="media-gallery-card">
                        <button class="gallery-nav-btn left" onclick="prevImage()" style="color:#dbb778">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <img id="mainGalleryImage" src="{{ asset('storage/' . json_decode($gallery->images, true)[0]) }}" alt="Car Image">
                        <button class="gallery-nav-btn right" onclick="nextImage()" style="color:#dbb778">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <button onclick="window.location.href='{{ route('gallery') }}'" class="media-gallery-btn">
                        VIEW GALLERY
                    </button>
                </div>
            </div>
            <section class="contact-section">
                <div class="contact-container">
                    <h2 class="contact-title">GET IN TOUCH WITH US !</h2>
                    <form id="contactForm" class="contact-form">
                        <div id="formMessage" style="margin-bottom: 20px;"></div>
                        @csrf
                        <div class="form-row">
                            <input type="text" placeholder="Full Name" name="first_name" class="form-input" id="first_name" required />
                            <input type="text" placeholder="Last Name" name="last_name" class="form-input" id="last_name" required />
                        </div>
                        <div class="form-row">
                            <input type="email" placeholder="Email" name="email" class="form-input full-width" id="email" required />
                        </div>
                        <div class="form-row interest-row">
                            <label class="form-label"><strong>What Interests You?</strong><span class="required">*</span></label>
                            <div class="checkbox-group">
                                <label><input type="checkbox" name="interest[]" value="Sports Cars" /> Sports Cars</label>
                                <label><input type="checkbox" name="interest[]" value="Classic Cars" /> Classic Cars</label>
                                <label><input type="checkbox" name="interest[]" value="Race Cars" /> Race Cars</label>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <button type="submit" class="submit-btn">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </section>
            @include('frontend.footer')
        </div>
    </div>
    <script  src="{{ asset('frontend/js/global.js') }}"></script>
    <script>
        const images = @json(json_decode($gallery->images));
        let currentIndex = 0;

        const mainImage = document.getElementById('mainGalleryImage');

        function showImage(index) {
            mainImage.src = `/storage/${images[index]}`;
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(currentIndex);
        }

        function showMessage(msg, type = 'success') {
            const messageBox = document.getElementById('formMessage');
            const div = document.createElement('div');
            div.className = type === 'error' ? 'custom-error' : 'custom-toast';
            div.textContent = msg;
            messageBox.innerHTML = ''; // clear previous messages
            messageBox.appendChild(div);

            setTimeout(() => div.classList.add('fade-out'), 5000);
            setTimeout(() => div.remove(), 6000);
        }

        function validateForm() {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();
            const interests = document.querySelectorAll('input[name="interest[]"]:checked');

            if (!firstName || !lastName || !email) {
                showMessage('Please fill in all required fields.', 'error');
                return false;
            }

            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                showMessage('Please enter a valid email address.', 'error');
                return false;
            }

            if (interests.length === 0) {
                showMessage('Please select at least one interest.', 'error');
                return false;
            }

            return true;
        }

        document.getElementById('contactForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            if (!validateForm()) return;

            const form = e.target;
            const formData = new FormData(form);

            try {
                const response = await fetch("{{ route('inquiry.submit') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage(result.message || 'Form submitted successfully.', 'success');
                    form.reset();
                } else {
                    handleErrors(result);
                }
            } catch (error) {
                showMessage('An unexpected error occurred.', 'error');
            }
        });

        function handleErrors(result) {
            if (result.errors) {
                const firstError = Object.values(result.errors)[0][0];
                showMessage(firstError, 'error');
            } else {
                showMessage(result.message || 'Something went wrong.', 'error');
            }
        }
    </script>

</body>

</html>