<?php

namespace EUCookieBar;

if (!class_exists(\Generic\AbstractModule::class)) {
    require file_exists(dirname(__DIR__) . '/Generic/AbstractModule.php')
        ? dirname(__DIR__) . '/Generic/AbstractModule.php'
        : __DIR__ . '/src/Generic/AbstractModule.php';
}

use Generic\AbstractModule;
use Zend\EventManager\Event;
use Zend\EventManager\SharedEventManagerInterface;

class Module extends AbstractModule
{
    const NAMESPACE = __NAMESPACE__;

    public function attachListeners(SharedEventManagerInterface $sharedEventManager)
    {
        $sharedEventManager->attach(
            '*',
            'view.layout',
            [$this, 'handleViewLayout']
        );
        $sharedEventManager->attach(
            \Omeka\Form\SiteSettingsForm::class,
            'form.add_elements',
            [$this, 'handleSiteSettings']
        );
    }

    public function handleViewLayout(Event $event)
    {
        $view = $event->getTarget();
        if (!$view->status()->isSiteRequest()) {
            return;
        }

        $message = $view->siteSetting('eucookiebar_message');
        if (empty($message)) {
            return;
        }

        $options = $view->siteSetting('eucookiebar_options');
        $options = json_decode($options, true) ?: [];
        if ($options) {
            $options['message'] = $message;
        }

        $js = 'var euCookieBarOptions = ' . json_encode($options, 320) . ';';

        $assetUrl = $view->plugin('assetUrl');
        $view->headLink()
            ->appendStylesheet($assetUrl('vendor/jquery.cookiebar/jquery.cookiebar.css', 'EUCookieBar'));
        $view->headScript()
            ->appendFile($assetUrl('vendor/jquery.cookiebar/jquery.cookiebar.js', 'EUCookieBar'), 'text/javascript', ['defer' => 'defer'])
            ->appendFile($assetUrl('js/eu-cookie-bar.js', 'EUCookieBar'), 'text/javascript', ['defer' => 'defer'])
            ->appendScript($js);
    }
}
