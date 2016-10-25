<?php
/**
 * Polder Knowledge / PhpSettingsModule (https://polderknowledge.com)
 *
 * @link https://github.com/polderknowledge/phpsettings-module for the canonical source repository
 * @copyright Copyright (c) 2002-2016 Polder Knowledge (https://www.polderknowledge.com)
 * @license https://github.com/polderknowledge/phpsettings-module/blob/master/LICENSE.md MIT
 */

namespace PolderKnowledge\PhpSettingsModuleTest;

use PHPUnit_Framework_TestCase;
use PolderKnowledge\PhpSettingsModule\Module;
use Zend\EventManager\EventManager;
use Zend\EventManager\SharedEventManager;
use Zend\ModuleManager\ModuleManager;

class ModuleTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PolderKnowledge\PhpSettingsModule\Module::getAutoloaderConfig
     */
    public function testGetAutoloaderConfig()
    {
        // Arrange
        $module = new Module();

        // Act
        $result = $module->getAutoloaderConfig();

        // Assert
        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('Zend\\Loader\\StandardAutoloader', $result);
    }

    /**
     * @covers PolderKnowledge\PhpSettingsModule\Module::getConfig
     */
    public function testGetConfig()
    {
        // Arrange
        $module = new Module();

        // Act
        $result = $module->getConfig();

        // Assert
        $this->assertInternalType('array', $result);
    }

    /**
     * @covers PolderKnowledge\PhpSettingsModule\Module::init
     */
    public function testInit()
    {
        // Arrange
        $module = new Module();

        $sharedManager = new SharedEventManager();

        $eventManagerBuilder = $this->getMockBuilder(EventManager::class);
        $eventManagerBuilder->disableOriginalConstructor();

        $eventManager = $eventManagerBuilder->getMock();
        $eventManager->expects(self::once())->method('getSharedManager')->willReturn($sharedManager);

        $moduleManagerBuilder = $this->getMockBuilder(ModuleManager::class);
        $moduleManagerBuilder->disableOriginalConstructor();

        $moduleManager = $moduleManagerBuilder->getMock();
        $moduleManager->expects(self::once())->method('getEventManager')->willReturn($eventManager);

        // Act
        $module->init($moduleManager);

        // Assert
        // ...
    }
}
