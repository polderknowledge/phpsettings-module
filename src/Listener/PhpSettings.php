<?php
/**
 * Polder Knowledge / PhpSettingsModule (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/phpsettings-module for the canonical source repository
 * @copyright Copyright (c) 2002-2016 Polder Knowledge (https://www.polderknowledge.com)
 * @license https://github.com/polderknowledge/phpsettings-module/blob/master/LICENSE.md MIT
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
