$(document).ready(function() {
    // Avoid an issue when an anti-cookie is enabled.
    if ($.isFunction($.fn.cookieBar)) {
        $.cookieBar(euCookieBarOptions);
    }
});
