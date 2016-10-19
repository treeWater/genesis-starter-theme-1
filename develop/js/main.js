var gst = (function ($) {
    'use strict';

    /**
     * Empty placeholder function.
     *
     * @since 1.0.0
     */
    var functionName = function () {
            // Empty function, do all the things.
        },

        /**
         * Fire events on document ready, and bind other events.
         *
         * @since 1.0.0
         */
        ready = function () {
            functionName();

            // Examples binding to events.
            $(window).on('resize.gst', functionName);
            $(window).on('scroll.gst resize.gst', functionName);
        };

    // Only expose the ready function to the world
    return {
        ready: ready
    };

})(jQuery);

jQuery(gst.ready);
