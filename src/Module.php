<?php
/**
 * Polder Knowledge / PhpSettingsModule (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/phpsettings-module for the canonical source repository
 * @copyright Copyright (c) 2002-2016 Polder Knowledge (https://www.polderknowledge.com)
 * @license https://github.com/polderknowledge/phpsettings-module/blob/master/LICENSE.md MIT
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
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
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
            [new PhpSettings, 'onBootstrap'],
            PHP_INT_MAX
        );
    }
}
