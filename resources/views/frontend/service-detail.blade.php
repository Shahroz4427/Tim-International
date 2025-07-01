<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="max-image-preview:large" />
    <link rel="stylesheet" href="{{ asset('frontend/css/servicedetail.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/global.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <title>TIM INTERNATIONAL</title>
</head>

<body class="wp-singular auto-listing-template-default single single-auto-listing postid-6780 wp-theme-Avada wp-child-theme-Avada-child tribe-js auto-listings awb-no-sidebars fusion-image-hovers fusion-pagination-sizing fusion-button_type-flat fusion-button_span-no fusion-button_gradient-linear avada-image-rollover-circle-yes avada-image-rollover-yes avada-image-rollover-direction-left fusion-body ltr fusion-sticky-header no-mobile-slidingbar no-mobile-totop avada-has-rev-slider-styles fusion-disable-outline fusion-sub-menu-fade mobile-logo-pos-left layout-wide-mode avada-has-boxed-modal-shadow-none layout-scroll-offset-full avada-has-zero-margin-offset-top fusion-top-header menu-text-align-center mobile-menu-design-modern fusion-show-pagination-text fusion-header-layout-v1 avada-responsive avada-footer-fx-none avada-menu-highlight-style-textcolor fusion-search-form-clean fusion-main-menu-search-overlay fusion-avatar-circle avada-dropdown-styles avada-blog-layout-large avada-blog-archive-layout-large avada-ec-not-100-width avada-ec-meta-layout-sidebar avada-header-shadow-no avada-menu-icon-position-left avada-has-megamenu-shadow avada-has-header-100-width avada-has-pagetitle-bg-parallax avada-has-breadcrumb-mobile-hidden avada-has-titlebar-hide avada-header-border-color-full-transparent avada-has-pagination-width_height avada-flyout-menu-direction-fade avada-ec-views-v2 do-animate fusion-no-touch">


    <div id="boxed-wrapper">
        <div id="wrapper" class="fusion-wrapper">

            @include('frontend.header')

            <main id="main" class="clearfix">
                <div class="fusion-row" style="margin-top:100px">
                    <div id="container" class="container">
                        <div id="content" class="content" role="main">
                            <div id="listing-6780" class="auto-listings-single listing">
                                <div class="ald_imagegallery">
                                    <div class="ald_imgbig">
                                        <img style="height: auto;" src="{{ asset('storage/'.$service->image) }}" />
                                    </div>
                                </div>

                                <div class="full-width upper listing_title">
                                    <h1 class="title entry-title" style="text-transform: uppercase;">{{ $service->name }}</h1>
                                </div>

                                <div style="display: flex; justify-content: center;">
                                    <p style="text-align: left; max-width: 86%; font-size: 16px; font-weight:400">
                                        {!! $service->description !!}
                                    </p>
                                </div>

                                <div class="listing_detail_row">
                                    <div class="clear"></div>

                                    <div class="listing_detail_botrow">
                                        <div class="ldbr_left" style="display: none;">
                                            <div class="description"></div>

                                            <div class="auto-listings-tabs al-tabs-wrapper">
                                                <ul class="tabs al-tabs" role="tablist">
                                                    <li class="details_tab active" id="tab-title-details" role="tab" aria-controls="tab-details">
                                                        <a href="#tab-details"> Details </a>
                                                    </li>
                                                    <li class="specifications_tab" id="tab-title-specifications" role="tab" aria-controls="tab-specifications">
                                                        <a href="#tab-specifications"> Specifications </a>
                                                    </li>
                                                </ul>

                                                <div class="auto-listings-Tabs-panel auto-listings-Tabs-panel--details panel al-tab" id="tab-details" role="tabpanel" aria-labelledby="tab-title-details">
                                                    <h4>Details</h4>

                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th>Price</th>
                                                                <td>
                                                                    <span class="price-amount"><span class="currency-symbol">$</span>0</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kilometers</th>
                                                                <td>n/a</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div
                                                    class="auto-listings-Tabs-panel auto-listings-Tabs-panel--specifications panel al-tab"
                                                    id="tab-specifications"
                                                    role="tabpanel"
                                                    aria-labelledby="tab-title-specifications"
                                                    style="display: none;"></div>
                                            </div>
                                        </div>

                                        <div class="ldbr_right">
                                            <div class="ald_enquiry">
                                                <div class="cardetail_enquirybox">
                                                    <!-- Message box -->
                                                    <div id="serviceFormMessage" style="margin-bottom: 20px;"></div>
                                                    <h3>ENQUIRY</h3>

                                                    <div class="contact-form">
                                                        <h4>Quick Contact</h4>
                                                        <form id="serviceInquiryForm">
                                                                                                                
                                                            @csrf
                                                            <input type="hidden" name="service" value="{{ $service->name }}">

                                                            <div class="rwmb-field rwmb-text-wrapper">
                                                                <input placeholder="Name" type="text" name="name" id="inq_name" required />
                                                            </div>

                                                            <div class="rwmb-field rwmb-text-wrapper">
                                                                <input placeholder="Email" type="email" name="email" id="inq_email" required />
                                                            </div>

                                                            <div class="rwmb-field rwmb-text-wrapper">
                                                                <input placeholder="Phone" type="text" name="phone" id="inq_phone" required />
                                                            </div>

                                                            <div class="rwmb-field rwmb-textarea-wrapper">
                                                                <textarea rows="3" placeholder="Message" name="message" id="inq_message" required></textarea>
                                                            </div>

                                                            <div class="rwmb-field rwmb-button-wrapper rwmb-form-submit">
                                                                <button type="submit" class="rwmb-button">Send Enquiry</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="full-width lower"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fusion-row -->
            </main>

            @include('frontend.footer')
        </div>
    </div>
    <script  src="{{ asset('frontend/js/global.js') }}"></script>
    <script>
        function showInquiryMessage(msg, type = 'success') {
            const messageBox = document.getElementById('serviceFormMessage');
            const div = document.createElement('div');
            div.className = type === 'error' ? 'custom-error' : 'custom-toast';
            div.textContent = msg;
            messageBox.innerHTML = ''; // Clear old messages
            messageBox.appendChild(div);

            setTimeout(() => div.classList.add('fade-out'), 5000);
            setTimeout(() => div.remove(), 6000);
        }

        function validateInquiryForm() {
            const name = document.getElementById('inq_name').value.trim();
            const email = document.getElementById('inq_email').value.trim();
            const phone = document.getElementById('inq_phone').value.trim();
            const message = document.getElementById('inq_message').value.trim();

            if (!name || !email || !phone || !message) {
                showInquiryMessage('Please fill in all required fields.', 'error');
                return false;
            }

            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                showInquiryMessage('Please enter a valid email address.', 'error');
                return false;
            }

            return true;
        }

        document.getElementById('serviceInquiryForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            if (!validateInquiryForm()) return;

            const form = e.target;
            const formData = new FormData(form);

            try {
                const response = await fetch("{{ route('service.inquiry.submit') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    showInquiryMessage(result.message || 'Thank you! We have received your inquiry.', 'success');
                    form.reset();
                } else {
                    handleInquiryErrors(result);
                }
            } catch (error) {
                showInquiryMessage('An unexpected error occurred.', 'error');
            }
        });

        function handleInquiryErrors(result) {
            if (result.errors) {
                const firstError = Object.values(result.errors)[0][0];
                showInquiryMessage(firstError, 'error');
            } else {
                showInquiryMessage(result.message || 'Submission failed.', 'error');
            }
        }
    </script>

</body>

</html>