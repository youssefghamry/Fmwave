(function ($) {
    "use strict";

    //function Load
    function fmwave_swipper_scripts_load() {
        var $ = jQuery;

        /*-------------------------------------
           Custom Cursor
        -------------------------------------*/
        function swipter_activator() {
            /*-------------------------------------
                Swiper Slider 
            -------------------------------------*/
            var mySwiper = new Swiper ('.swiper-container', {
                // Optional parameters
                direction: 'horizontal',
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                mousewheel: true,
                keyboard: {
                    enabled: true
                }
            });
        }


        /*-------------------------------------
            Custom cursor Init
        -------------------------------------*/
        swipter_activator();
    }

    // Window Load+Resize
    $(window).on('load resize', function (){
        // Elementor Frontend Load
        $(window).on('elementor/frontend/init', function () {
            if (elementorFrontend.isEditMode()) {
                elementorFrontend.hooks.addAction('frontend/element_ready/widget', function () {
                    fmwave_swipper_scripts_load();
                });
            }
        });
    });

    // Window Load
    $(window).on('load', function (){
        fmwave_swipper_scripts_load();
    });

})(jQuery);