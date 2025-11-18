<?php

namespace Vigihdev\WpKernel\Tests;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpKernel\Service\ServiceManager;

class ServiceManagerTest extends TestCase
{
    private ServiceManager $serviceManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->serviceManager = new ServiceManager([
            'service1' => new \stdClass(),
            'service2' => new \stdClass(),
        ]);
    }

    #[Test]
    public function it_can_get_a_service()
    {
        $service = $this->serviceManager->getService('service1');
        $this->assertInstanceOf(\stdClass::class, $service);
    }

    #[Test]
    public function it_throws_an_exception_for_a_non_existent_service()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->serviceManager->getService('non_existent_service');
    }

    #[Test]
    public function it_can_check_if_a_service_exists()
    {
        $this->assertTrue($this->serviceManager->hasService('service1'));
        $this->assertFalse($this->serviceManager->hasService('non_existent_service'));
    }

    #[Test]
    public function it_can_get_available_service_names()
    {
        $this->assertEquals(['service1', 'service2'], $this->serviceManager->getAvailableServiceNames());
    }
}
