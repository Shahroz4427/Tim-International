<style>

    
    body {
        font-family: "Open Sans", Arial, Helvetica, sans-serif !important;
    }

    /*! CSS Used from: http://127.0.0.1:8000/home/css/main.css */
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

        .fusion-animated {
            position: relative;
            z-index: 2000;
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

    .fusion-footer-widget-area .fusion-row {
        max-width: var(--site_width);
    }

    html:not(.avada-has-site-width-percent) .fusion-footer-widget-area {
        padding-left: 30px;
        padding-right: 30px;
    }

    .fusion-footer.fusion-tb-footer .fusion-footer-widget-area {
        padding: 0;
    }

    body a,
    body a:after,
    body a:before {
        color: var(--link_color);
    }

    .fusion-footer-widget-area {
        --footerw_bg_full-size: initial;
        --footerw_bg_full-position: var(--footerw_bg_pos);
        --footerw_bg_repeat: no-repeat;
        --footerw_bg_pos: center center;
        --footer_bg_color: var(--awb-color7);
        --footer_border_size: 0px;
        --footer_border_color: var(--awb-color1);
        --footer_link_color: hsla(var(--awb-color1-h), var(--awb-color1-s), var(--awb-color1-l), calc(var(--awb-color1-a) - 20%));
        --footer_link_color_hover: var(--awb-color4);
    }

    .fusion-footer {
        --footer_area_padding-top: 60px;
        --footer_area_padding-bottom: 64px;
        --footer_area_padding-left: 0px;
        --footer_area_padding-right: 0px;
        --footer_divider_line-flex: block;
        --footer_divider_line_size: 1px;
        --footer_divider_line_style: solid;
        --footer_widgets_padding: 16px;
    }

    .fusion-text {
        --awb-content-alignment: initial;
        --awb-font-size: inherit;
        --awb-line-height: inherit;
        --awb-letter-spacing: inherit;
        --awb-text-transform: inherit;
        --awb-text-color: inherit;
        --awb-text-font-family: inherit;
        --awb-text-font-style: inherit;
        --awb-text-font-weight: inherit;
        --awb-columns: var(--text_columns, auto);
        --awb-column-spacing: var(--text_column_spacing, normal);
        --awb-column-min-width: var(--text_column_min_width, auto);
        --awb-rule-style: var(--text_rule_style, initial);
        --awb-margin-top: 0;
        --awb-margin-right: 0;
        --awb-margin-bottom: 0;
        --awb-margin-left: 0;
        text-align: var(--awb-content-alignment);
        font-size: var(--awb-font-size);
        line-height: var(--awb-line-height);
        letter-spacing: var(--awb-letter-spacing);
        text-transform: var(--awb-text-transform);
        color: var(--awb-text-color);
        font-family: var(--awb-text-font-family);
        font-weight: var(--awb-text-font-weight);
        font-style: var(--awb-text-font-style);
        margin: var(--awb-margin-top) var(--awb-margin-right) var(--awb-margin-bottom) var(--awb-margin-left);
    }

    .fusion-builder-row {
        width: 100%;
        margin: 0 auto;
    }

    .fusion-builder-row:after {
        clear: both;
        content: " ";
        display: table;
    }

    .fusion-fullwidth {
        position: relative;
    }

    .fusion-fullwidth .fusion-row {
        position: relative;
        z-index: 10;
    }

    .fusion-fullwidth {
        --awb-background-color: var(--full_width_bg_color);
        --awb-background-image: none;
        --awb-background-position: center center;
        --awb-background-repeat: no-repeat;
        --awb-background-blend-mode: none;
        --awb-background-size: initial;
        --awb-box-shadow: none;
        --awb-border-sizes-top: var(--full_width_border_sizes_top);
        --awb-border-sizes-right: var(--full_width_border_sizes_right);
        --awb-border-sizes-bottom: var(--full_width_border_sizes_bottom);
        --awb-border-sizes-left: var(--full_width_border_sizes_left);
        --awb-border-color: var(--full_width_border_color);
        --awb-border-style: solid;
        --awb-border-radius-top-left: 0;
        --awb-border-radius-top-right: 0;
        --awb-border-radius-bottom-left: 0;
        --awb-border-radius-bottom-right: 0;
        --awb-padding-top: var(--container_padding_default_top, 0px);
        --awb-padding-right: var(--container_padding_default_right, 0px);
        --awb-padding-bottom: var(--container_padding_default_bottom, 0px);
        --awb-padding-left: var(--container_padding_default_left, 0px);
        --awb-margin-top: 0;
        --awb-margin-bottom: 0;
        --awb-min-height: 0;
        --awb-overflow: visible;
        --awb-z-index: auto;
        --awb-sticky-background-color: var(--awb-background-color);
        --awb-sticky-height: var(--awb-min-height);
        --awb-filter: none;
        --awb-filter-hover: none;
        --awb-filter-transition: all;
        background-color: var(--awb-background-color);
        background-image: var(--awb-background-image);
        background-position: var(--awb-background-position);
        background-repeat: var(--awb-background-repeat);
        background-blend-mode: var(--awb-background-blend-mode);
        background-size: var(--awb-background-size);
        box-shadow: var(--awb-box-shadow);
        border-width: var(--awb-border-sizes-top) var(--awb-border-sizes-right) var(--awb-border-sizes-bottom) var(--awb-border-sizes-left);
        border-color: var(--awb-border-color);
        border-style: var(--awb-border-style);
        border-radius: var(--awb-border-radius-top-left) var(--awb-border-radius-top-right) var(--awb-border-radius-bottom-right) var(--awb-border-radius-bottom-left);
        padding: var(--awb-padding-top) var(--awb-padding-right) var(--awb-padding-bottom) var(--awb-padding-left);
        margin-top: var(--awb-margin-top);
        margin-bottom: var(--awb-margin-bottom);
        min-height: var(--awb-min-height);
        overflow: var(--awb-overflow);
        z-index: var(--awb-z-index);
        filter: var(--awb-filter);
        transition: var(--awb-filter-transition);
    }

    .fusion-fullwidth:hover {
        filter: var(--awb-filter-hover);
    }

    .fusion-tb-footer .fusion-fullwidth {
        --awb-padding-top: var(--container_padding_100_top, 0px);
        --awb-padding-right: var(--container_padding_100_right, var(--hundredp_padding));
        --awb-padding-bottom: var(--container_padding_100_bottom, 0px);
        --awb-padding-left: var(--container_padding_100_left, var(--hundredp_padding));
    }

    .hundred-percent-fullwidth .fusion-row {
        max-width: none !important;
    }

    .fusion-flex-container {
        display: flex;
        justify-content: center;
    }

    .fusion-flex-container .fusion-row {
        display: flex;
        flex-wrap: wrap;
        flex: 1;
        width: 100%;
    }

    .fusion-flex-container .fusion-row:after,
    .fusion-flex-container .fusion-row:before {
        content: none;
    }

    .fusion-flex-container .fusion-row .fusion-flex-column {
        display: flex;
    }

    .fusion-flex-container .fusion-row .fusion-flex-column .fusion-column-wrapper {
        width: 100%;
    }

    .fusion-flex-container .fusion-row .fusion-flex-column .fusion-column-wrapper:not(.fusion-flex-column-wrapper-legacy) {
        display: flex;
    }

    .fusion-flex-container .fusion-row .fusion-flex-column .fusion-column-wrapper:not(.fusion-flex-column-wrapper-legacy).fusion-content-layout-column {
        flex-direction: column;
    }

    .fusion-flex-container .fusion-flex-align-items-center {
        align-items: center;
    }

    .fusion-flex-container .fusion-flex-justify-content-flex-start {
        justify-content: flex-start;
    }

    .fusion_builder_column {
        --awb-z-index: auto;
        --awb-z-index-hover: var(--awb-z-index);
        --awb-absolute-top: auto;
        --awb-absolute-right: auto;
        --awb-absolute-bottom: auto;
        --awb-absolute-left: auto;
        --awb-container-position: relative;
        --awb-overflow: visible;
        --awb-inner-bg-overflow: visible;
        --awb-bg-color: transparent;
        --awb-inner-bg-color: transparent;
        --awb-bg-position: left top;
        --awb-inner-bg-position: left top;
        --awb-bg-image: none;
        --awb-inner-bg-image: none;
        --awb-bg-blend: none;
        --awb-inner-bg-blend: none;
        --awb-bg-repeat: no-repeat;
        --awb-inner-bg-repeat: no-repeat;
        --awb-bg-size: auto auto;
        --awb-inner-bg-size: auto auto;
        --awb-border-top: 0;
        --awb-border-right: 0;
        --awb-border-bottom: 0;
        --awb-border-left: 0;
        --awb-border-color: initial;
        --awb-border-style: solid;
        --awb-inner-border-top: 0;
        --awb-inner-border-right: 0;
        --awb-inner-border-bottom: 0;
        --awb-inner-border-left: 0;
        --awb-inner-border-color: initial;
        --awb-inner-border-style: solid;
        --awb-border-radius: 0;
        --awb-inner-bg-border-radius: 0;
        --awb-liftup-border-radius: 0;
        --awb-box-shadow: none;
        --awb-inner-bg-box-shadow: none;
        --awb-padding-top: 0;
        --awb-padding-right: 0;
        --awb-padding-bottom: 0;
        --awb-padding-left: 0;
        --awb-transform: none;
        --awb-transform-hover: var(--awb-transform);
        --awb-transform-parent-hover: var(--awb-transform);
        --awb-transform-origin: 50% 50%;
        --awb-transition: transform 300ms ease, filter 300ms ease;
        --awb-filter: none;
        --awb-filter-hover: var(--awb-filter);
        --awb-filter-parent-hover: var(--awb-filter);
        --awb-col-width: var(--awb-width-large, 33.3333%);
        --awb-col-order: var(--awb-order-large, 0);
        --awb-margin-top-large: var(--col_margin-top, 0);
        --awb-margin-bottom-large: var(--col_margin-bottom, 20px);
        --awb-spacing-left-large: var(--col_spacing, 4%);
        --awb-spacing-right-large: var(--col_spacing, 4%);
        --awb-margin-top: var(--awb-margin-top-large);
        --awb-margin-bottom: var(--awb-margin-bottom-large);
        --awb-spacing-left: var(--awb-spacing-left-large);
        --awb-spacing-right: var(--awb-spacing-right-large);
    }

    .fusion-layout-column {
        position: var(--awb-container-position);
        float: left;
        margin-top: var(--awb-margin-top);
        z-index: var(--awb-z-index);
        top: var(--awb-absolute-top);
        right: var(--awb-absolute-right);
        bottom: var(--awb-absolute-bottom);
        left: var(--awb-absolute-left);
        filter: var(--awb-filter);
        transition: var(--awb-transition);
        width: var(--awb-col-width);
        order: var(--awb-col-order);
    }

    .fusion-layout-column:hover {
        filter: var(--awb-filter-hover);
        z-index: var(--awb-z-index-hover);
    }

    .fusion-layout-column .fusion-column-wrapper {
        background-image: var(--awb-bg-image);
        background-color: var(--awb-bg-color);
        background-position: var(--awb-bg-position);
        background-blend-mode: var(--awb-bg-blend);
        background-repeat: var(--awb-bg-repeat);
        background-size: var(--awb-bg-size);
        border-width: var(--awb-border-top) var(--awb-border-right) var(--awb-border-bottom) var(--awb-border-left);
        border-color: var(--awb-border-color);
        border-style: var(--awb-border-style);
        border-radius: var(--awb-border-radius);
        box-shadow: var(--awb-box-shadow);
        padding: var(--awb-padding-top) var(--awb-padding-right) var(--awb-padding-bottom) var(--awb-padding-left);
        overflow: var(--awb-overflow);
        transition: var(--awb-transition);
        transform: var(--awb-transform);
        transform-origin: var(--awb-transform-origin);
        min-height: 1px;
        min-width: 0;
        margin-left: var(--awb-spacing-left);
        margin-right: var(--awb-spacing-right);
    }

    body:not(.fusion-builder-live-preview) .fusion-column-wrapper:hover {
        transform: var(--awb-transform-hover);
    }

    body:not(.fusion-builder-live-preview) .fusion-builder-row:hover>.fusion_builder_column>.fusion-column-wrapper {
        transform: var(--awb-transform-parent-hover);
    }

    body:not(.fusion-builder-live-preview) .fusion-builder-row:hover>.fusion_builder_column>.fusion-column-wrapper:hover {
        transform: var(--awb-transform-hover);
    }

    .fusion-builder-row:hover>.fusion_builder_column {
        filter: var(--awb-filter-parent-hover);
    }

    .fusion-builder-row:hover>.fusion_builder_column:hover {
        filter: var(--awb-filter-hover);
    }

    .fusion-animated {
        visibility: hidden;
    }

    .do-animate .fusion-animated {
        animation-fill-mode: both;
        animation-duration: 1s;
    }

    @media only screen and (max-width: 1024px) {
        .fusion-fullwidth {
            --awb-padding-top-medium: var(--awb-padding-top);
            --awb-padding-right-medium: var(--awb-padding-right);
            --awb-padding-bottom-medium: var(--awb-padding-bottom);
            --awb-padding-left-medium: var(--awb-padding-left);
            --awb-margin-top-medium: var(--awb-margin-top);
            --awb-margin-bottom-medium: var(--awb-margin-bottom);
            --awb-min-height-medium: var(--awb-min-height);
            --awb-sticky-height-medium: var(--awb-min-height-medium);
            padding: var(--awb-padding-top-medium) var(--awb-padding-right-medium) var(--awb-padding-bottom-medium) var(--awb-padding-left-medium);
            margin-top: var(--awb-margin-top-medium);
            margin-bottom: var(--awb-margin-bottom-medium);
            min-height: var(--awb-min-height-medium);
        }
    }

    @media only screen and (max-width: 640px) {
        .fusion-fullwidth {
            --awb-padding-top-small: var(--awb-padding-top-medium);
            --awb-padding-right-small: var(--awb-padding-right-medium);
            --awb-padding-bottom-small: var(--awb-padding-bottom-medium);
            --awb-padding-left-small: var(--awb-padding-left-medium);
            --awb-margin-top-small: var(--awb-margin-top-medium);
            --awb-margin-bottom-small: var(--awb-margin-bottom-medium);
            --awb-min-height-small: var(--awb-min-height-medium);
            --awb-sticky-height-small: var(--awb-min-height-small);
            padding: var(--awb-padding-top-small) var(--awb-padding-right-small) var(--awb-padding-bottom-small) var(--awb-padding-left-small);
            margin-top: var(--awb-margin-top-small);
            margin-bottom: var(--awb-margin-bottom-small);
            min-height: var(--awb-min-height-small);
        }
    }

    @media only screen and (max-width: 1024px) {
        .fusion_builder_column {
            --awb-padding-top-medium: var(--awb-padding-top);
            --awb-padding-right-medium: var(--awb-padding-right);
            --awb-padding-bottom-medium: var(--awb-padding-bottom);
            --awb-padding-left-medium: var(--awb-padding-left);
            --awb-col-width: var(--awb-width-medium, var(--medium-col-default));
            --awb-col-order: var(--awb-order-medium, var(--awb-order-large));
            --awb-margin-top-medium: var(--awb-margin-top-large, var(--col_margin-top, 0));
            --awb-margin-bottom-medium: var(--awb-margin-bottom-large, var(--col_margin-bottom, 20px));
            --awb-spacing-left-medium: var(--awb-spacing-left-large, 4%);
            --awb-spacing-right-medium: var(--awb-spacing-right-large, 4%);
            --awb-margin-top: var(--awb-margin-top-medium);
            --awb-margin-bottom: var(--awb-margin-bottom-medium);
            --awb-spacing-left: var(--awb-spacing-left-medium);
            --awb-spacing-right: var(--awb-spacing-right-medium);
        }

        .fusion_builder_column .fusion-column-wrapper {
            padding: var(--awb-padding-top-medium) var(--awb-padding-right-medium) var(--awb-padding-bottom-medium) var(--awb-padding-left-medium);
        }
    }

    @media only screen and (max-width: 640px) {
        .fusion_builder_column {
            --awb-padding-top-small: var(--awb-padding-top-medium);
            --awb-padding-right-small: var(--awb-padding-right-medium);
            --awb-padding-bottom-small: var(--awb-padding-bottom-medium);
            --awb-padding-left-small: var(--awb-padding-left-medium);
            --awb-col-width: var(--awb-width-small, var(--small-col-default));
            --awb-col-order: var(--awb-order-small, var(--awb-order-medium));
            --awb-spacing-left-small: var(--awb-spacing-left-large, 4%);
            --awb-spacing-right-small: var(--awb-spacing-right-large, 4%);
            --awb-margin-top-small: var(--awb-margin-top-medium, var(--awb-margin-top-large, var(--col_margin-top, 0)));
            --awb-margin-bottom-small: var(--awb-margin-bottom-medium, var(--awb-margin-bottom-large, var(--col_margin-bottom, 20px)));
            --awb-spacing-left: var(--awb-spacing-left-small);
            --awb-spacing-right: var(--awb-spacing-right-small);
            --awb-margin-top: var(--awb-margin-top-small);
            --awb-margin-bottom: var(--awb-margin-bottom-small);
        }

        .fusion_builder_column .fusion-column-wrapper {
            padding: var(--awb-padding-top-small) var(--awb-padding-right-small) var(--awb-padding-bottom-small) var(--awb-padding-left-small);
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait) {
        .fullwidth-box {
            background-attachment: scroll !important;
        }

        .fullwidth-box,
        .fusion-footer-widget-area {
            background-attachment: scroll !important;
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) {
        .fullwidth-box {
            background-attachment: scroll !important;
        }

        .fullwidth-box,
        .fusion-footer-widget-area {
            background-attachment: scroll !important;
        }
    }

    @media only screen and (max-width: 800px) {
        .fusion-layout-column {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .fullwidth-box {
            background-attachment: scroll !important;
        }
    }

    @media only screen and (max-device-width: 640px) {
        .fullwidth-box {
            background-attachment: scroll !important;
        }
    }


</style>

<div class="fusion-tb-footer fusion-footer">
    <div class="fusion-footer-widget-area fusion-widget-area">
        <div class="fusion-fullwidth fullwidth-box fusion-builder-row-6 fusion-flex-container has-pattern-background has-mask-background hundred-percent-fullwidth non-hundred-percent-height-scrolling" style="
                                --awb-border-sizes-top: 1px;
                                --awb-border-color: var(--awb-color1);
                                --awb-border-radius-top-left: 0px;
                                --awb-border-radius-top-right: 0px;
                                --awb-border-radius-bottom-right: 0px;
                                --awb-border-radius-bottom-left: 0px;
                                --awb-background-color: var(--awb-color7);
                            ">
            <div class="fusion-builder-row fusion-row fusion-flex-align-items-center" style="width: 104% !important; max-width: 104% !important; margin-left: calc(-4% / 2); margin-right: calc(-4% / 2);">

                <div class="fusion-layout-column fusion_builder_column fusion-builder-column-9 fusion_builder_column_1_1 1_1 fusion-flex-column" style="
                                        --awb-bg-size: cover;
                                        --awb-width-large: 100%;
                                        --awb-margin-top-large: 0px;
                                        --awb-spacing-right-large: 1.92%;
                                        --awb-spacing-left-large: 1.92%;
                                        --awb-width-medium: 100%;
                                        --awb-order-medium: 0;
                                        --awb-spacing-right-medium: 1.92%;
                                        --awb-spacing-left-medium: 1.92%;
                                        --awb-width-small: 100%;
                                        --awb-order-small: 0;
                                        --awb-spacing-right-small: 1.92%;
                                        --awb-spacing-left-small: 1.92%;
                                         margin-bottom:0 !important;
                                    ">
                    <div class="fusion-column-wrapper fusion-column-has-shadow fusion-flex-justify-content-flex-start fusion-content-layout-column">
                        <div class="fusion-text fusion-text-2 fusion-animated" style="
                                                --awb-content-alignment: center;
                                                --awb-font-size: 11px;
                                                --awb-text-color: var(--awb-color3);
                                                --awb-text-font-family: Verdana, Geneva, sans-serif;
                                                --awb-text-font-style: normal;
                                                --awb-text-font-weight: 400;
                                                visibility: visible;
                                                animation-duration: 1s;
                                                animation-delay: 0.1s;
                                            " data-animationtype="fadeIn" data-animationduration="1.0" data-animationdelay="0.1" data-animationoffset="top-into-view">
                            <p class="" style="color:white;font-size: 12px;">© TIM International Copyright 2025 – All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>