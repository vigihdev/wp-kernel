<?php

namespace VigihDev\WpKernel\Tests;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Vigihdev\WpKernel\WpKernel;

class DotEnvWpServiceTest extends TestCase
{

    protected function setUp(): void
    {
        WpKernel::boot(
            basePath: dirname(__DIR__),
            configDir: 'config',
            enableAutoInjection: true,
        );
    }

    #[Test]
    public function it_env_const_wp_load()
    {
        $this->assertTrue(defined('ABSPATH'));
        Assert::assertIsString(getenv('ABSPATH'));
        Assert::assertIsString(getenv('WPINC'));
        Assert::assertIsString(getenv('WP_CONTENT_DIR'));
        Assert::assertIsString(getenv('WP_CONTENT_URL'));
        Assert::assertIsString(getenv('STYLESHEETPATH'));
    }
}
