<?php
namespace EUCookieBar;

return [
    'form_elements' => [
        'invokables' => [
            Form\SiteSettingsFieldset::class => Form\SiteSettingsFieldset::class,
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => dirname(__DIR__) . '/language',
                'pattern' => '%s.mo',
                'text_domain' => null,
            ],
        ],
    ],
    'eucookiebar' => [
        'site_settings' => [
            'eucookiebar_message' => 'Warning: this site uses cookies or other means to steal your personal data and to allow Google or Facebook to fetch them. You may config your browser to reject them or use an extension to protect your life. See terms and conditions. By visiting this site, you accept them.', // @translate
            // See included library vendor/jquery.cookiebar/jquery.cookiebar.js for more options.
            'eucookiebar_options' => '{
    "acceptButton": true,
    "acceptText": "OK",
    "declineButton": false,
    "declineText": "Disable Cookies",
    "policyButton": false,
    "policyText": "Privacy Policy",
    "policyURL": "/",
    "bottom": true,
    "fixed": true,
    "zindex": "99999"
}',
        ],
    ],
];
