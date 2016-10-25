<?php
/**
 * Polder Knowledge / PhpSettingsModule (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/phpsettings-module for the canonical source repository
 * @copyright Copyright (c) 2002-2016 Polder Knowledge (https://www.polderknowledge.com)
 * @license https://github.com/polderknowledge/phpsettings-module/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\PhpSettingsModuleTest\Listener;

use PHPUnit_Framework_TestCase;
use PolderKnowledge\PhpSettingsModule\Listener\PhpSettings;
use Zend\Mvc\Application;
use Zend\Mvc\MvcEvent;

class PhpSettingsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PolderKnowledge\PhpSettingsModule\Listener\PhpSettings::onBootstrap
     */
    public function testOnBootstrap()
    {
        // Arrange
        $application = $this->getMockBuilder(Application::class);
        $application->disableOriginalConstructor();
        $application = $application->getMock();
        $application->expects($this->once())->method('getConfig')->willReturn([
            'phpSettings' => [
                'error_reporting' => E_ALL,
            ],
        ]);

        $event = new MvcEvent();
        $event->setApplication($application);

        $listener = new PhpSettings();

        // Act
        $listener->onBootstrap($event);

        // Assert
        // We can't test the ini_set call so we ignore that from coverage, the assertion on top of this
        // test will suffice for now.
    }
}
