$.extend(true, $.magnificPopup.defaults, {
    tClose: 'Close (Esc)',
    // Alt text on close button
    tLoading: 'Loading...',
    // Text that is displayed during loading. Can contain %curr% and %total% keys
    gallery: {
        tPrev: 'Previous (Left arrow key)',
        // Alt text on left arrow
        tNext: 'Next (Right arrow key)',
        // Alt text on right arrow
        tCounter: '%curr% sur %total%' // Markup for "1 of 7" counter

    },
    image: {
        tError: '<a href="%url%">The image</a> could not be loaded.' // Error message when image could not be loaded

    },
    ajax: {
        tError: '<a href="%url%">The content</a> could not be loaded.' // Error message when ajax request failed

    }
});
$(document).ready(function () {
    $('.parent-container').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            // options for gallery
            enabled: true
        }
    });
});
