<?php
/**
 * Polder Knowledge / PhpSettingsModule (http://polderknowledge.nl)
 *
 * @link http://developers.polderknowledge.nl/gitlab/polderknowledge/phpsettings-module for the canonical source repository
 * @copyright Copyright (c) 2015-2015 Polder Knowledge (http://www.polderknowledge.nl)
 * @license http://polderknowledge.nl/license/proprietary proprietary
 */

namespace PolderKnowledge\PhpSettingsModuleTest;

use PHPUnit_Framework_TestCase;
use PolderKnowledge\PhpSettingsModule\Module;
use Zend\EventManager\EventManager;
use Zend\EventManager\SharedEventManager;
use Zend\ModuleManager\ModuleManager;

class ModuleTest extends PHPUnit_Framework_TestCase
{
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

    public function testGetConfig()
    {
        // Arrange
        $module = new Module();

        // Act
        $result = $module->getConfig();

        // Assert
        $this->assertInternalType('array', $result);
    }

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
