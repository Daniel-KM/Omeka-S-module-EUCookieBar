$(document).ready(function() {
    // Check to avoid an issue when an anti-cookie is enable.
    if ($.isFunction($.fn.cookieBar)) {
        $.cookieBar(euCookieBarOptions);
    }
});
