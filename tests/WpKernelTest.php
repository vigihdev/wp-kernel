<?php

namespace Vigihdev\WpKernel\Tests;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpKernel\WpKernel;

class WpKernelTest extends TestCase
{

    #[Test]
    public function it_boots_without_errors()
    {
        WpKernel::boot(
            basePath: dirname(__DIR__),
            configDir: 'config',
            enableAutoInjection: true,
        );

        // If no exception is thrown, the test passes.
        $this->assertTrue(true);
    }

    #[Test]
    public function it_throws_an_exception_if_config_directory_does_not_exist()
    {
        $this->expectException(\RuntimeException::class);

        WpKernel::boot(
            basePath: dirname(__DIR__),
            configDir: 'non_existent_config_dir',
            enableAutoInjection: true,
        );
    }
}
