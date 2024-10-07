<?php declare(strict_types=1);

namespace EUCookieBar\Form;

use Laminas\Form\Element;
use Laminas\Form\Fieldset;
use Omeka\Form\Element as OmekaElement;

class SiteSettingsFieldset extends Fieldset
{
    protected $label = 'EU cookie bar'; // @translate

    protected $elementGroups = [
        'privacy' => 'Privacy', // @translate
    ];

    public function init(): void
    {
        $this
            ->setAttribute('id', 'eu-cookie-bar')
            ->setOption('element_groups', $this->elementGroups)
            ->add([
                'name' => 'eucookiebar_message',
                'type' => OmekaElement\CkeditorInline::class,
                'options' => [
                    'element_group' => 'privacy',
                    'label' => 'Message to display for EU cookie bar', // @translate
                ],
                'attributes' => [
                    'id' => 'eucookiebar_message',
                    'placeholder' => 'Warning: this site uses cookies or other means to steal your personal data and to allow Google or Facebook to fetch them. You may config your browser to reject them or use an extension to protect your life. See terms and conditions. By visiting this site, you accept them.', // @translate
                ],
            ])
            ->add([
                'name' => 'eucookiebar_options',
                'type' => Element\Textarea::class,
                'options' => [
                    'element_group' => 'privacy',
                    'label' => 'Other options (json)', // @translate
                    'info' => 'Click below for more options about the integrated library.', // @translate
                    'documentation' => 'https://gitlab.com/Daniel-KM/Omeka-S-module-EUCookieBar/~/blob/master/asset/vendor/jquery.cookiebar/jquery.cookiebar.js#L26-L50',
                ],
                'attributes' => [
                    'id' => 'eucookiebar_options',
                ],
            ])
        ;
    }
}
