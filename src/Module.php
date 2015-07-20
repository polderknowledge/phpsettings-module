<?php
/**
 * Polder Knowledge / PhpSettingsModule (http://polderknowledge.nl)
 *
 * @link http://developers.polderknowledge.nl/gitlab/polderknowledge/phpsettings-module for the canonical source repository
 * @copyright Copyright (c) 2015-2015 Polder Knowledge (http://www.polderknowledge.nl)
 * @license http://polderknowledge.nl/license/proprietary proprietary
 */

namespace PolderKnowledge\PhpSettingsModule;

use PolderKnowledge\PhpSettingsModule\Listener\PhpSettings;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\Application;
use Zend\Mvc\MvcEvent;

/**
 * The module class that handles the setting of PHP configuration options.
 */
class Module
{
    /**
     * Gets the autoloader for this module.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * Gets the configuration of this module.
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Initializes the module.
     *
     * @param ModuleManager $moduleManager The module manager that is used by Zend Framework.
     */
    public function init(ModuleManager $moduleManager)
    {
        $sharedManager = $moduleManager->getEventManager()->getSharedManager();
        $sharedManager->attach(
            Application::class,
            MvcEvent::EVENT_BOOTSTRAP,
            array(new PhpSettings, 'onBootstrap'),
            PHP_INT_MAX
        );
    }
}
