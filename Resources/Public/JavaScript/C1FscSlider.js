/* global jQuery */
(function ($) {
    'use strict';
    $(document).ready(function () {
        var $slider = $('.c1-fsc-slider');
        if ($slider.length) {
            $slider.slick($slider.data('options'));
        }
    });
})(jQuery);
