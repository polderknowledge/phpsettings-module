<?php
/**
 * Polder Knowledge / PhpSettingsModule (http://polderknowledge.nl)
 *
 * @link http://developers.polderknowledge.nl/gitlab/polderknowledge/phpsettings-module for the canonical source repository
 * @copyright Copyright (c) 2015-2015 Polder Knowledge (http://www.polderknowledge.nl)
 * @license http://polderknowledge.nl/license/proprietary proprietary
 */

namespace PolderKnowledge\PhpSettingsModule\Listener;

use Zend\Mvc\MvcEvent;

/**
 * The PhpSettings class is a listener that listens to the bootstrap event. At that moment the config array is read
 * and all configured PHP settings are set.
 */
class PhpSettings
{
    /**
     * The callback method that is called on bootstrap.
     *
     * @param MvcEvent $e The event parameters that were passed to the bootstrap event.
     */
    public function onBootstrap(MvcEvent $e)
    {
        $config = $e->getApplication()->getConfig();

        if (isset($config['phpSettings']) && is_array($config['phpSettings'])) {
            foreach ($config['phpSettings'] as $key => $value) {
                ini_set($key, $value);
            }
        }
    }
}
