<?php
namespace EUCookieBar\Form;

use Omeka\Form\Element\CkeditorInline;
use Zend\Form\Element;
use Zend\Form\Fieldset;

class SiteSettingsFieldset extends Fieldset
{
    protected $label = 'EU cookie bar'; // @translate

    public function init()
    {
        $this
            ->add([
                'name' => 'eucookiebar_message',
                'type' => CkeditorInline::class,
                'options' => [
                    'label' => 'Message to display', // @translate
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
                    'label' => 'Other options (json)', // @translate
                    'info' => 'See integrated library in asset/vendor/jquery.cookiebar for more options.', // @translate
                ],
                'attributes' => [
                    'id' => 'eucookiebar_options',
                ],
            ])
        ;
    }
}
