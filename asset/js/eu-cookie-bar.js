$(document).ready(function() {
    // Avoid an issue when an anti-cookie is enabled.
    if ($.isFunction($.cookieBar)) {
        $.cookieBar(euCookieBarOptions);
    }
});
