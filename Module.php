<?php declare(strict_types=1);

namespace EUCookieBar;

if (!class_exists(\Common\TraitModule::class)) {
    require_once dirname(__DIR__) . '/Common/TraitModule.php';
}

use Common\TraitModule;
use Laminas\EventManager\Event;
use Laminas\EventManager\SharedEventManagerInterface;
use Omeka\Module\AbstractModule;

/**
 * EU Cookie Bar.
 *
 * @copyright Daniel Berthereau, 2010-2024
 * @license http://www.cecill.info/licences/Licence_CeCILL_V2.1-en.txt
 */
class Module extends AbstractModule
{
    use TraitModule;

    const NAMESPACE = __NAMESPACE__;

    protected function preInstall(): void
    {
        $services = $this->getServiceLocator();
        $plugins = $services->get('ControllerPluginManager');
        $translate = $plugins->get('translate');

        if (!method_exists($this, 'checkModuleActiveVersion') || !$this->checkModuleActiveVersion('Common', '3.4.62')) {
            $message = new \Omeka\Stdlib\Message(
                $translate('The module %1$s should be upgraded to version %2$s or later.'), // @translate
                'Common', '3.4.62'
            );
            throw new \Omeka\Module\Exception\ModuleCannotInstallException((string) $message);
        }
    }

    public function attachListeners(SharedEventManagerInterface $sharedEventManager): void
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

    public function handleViewLayout(Event $event): void
    {
        $view = $event->getTarget();
        if (!$view->status()->isSiteRequest()) {
            return;
        }

        $siteSettings = $this->getServiceLocator()->get('Omeka\Settings\Site');

        $message = $siteSettings->get('eucookiebar_message');
        if (empty($message)) {
            return;
        }

        $options = $siteSettings->get('eucookiebar_options');
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
