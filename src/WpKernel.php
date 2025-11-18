<?php

declare(strict_types=1);

namespace Vigihdev\WpKernel;

use Symfony\Component\Filesystem\Path;
use VigihDev\SymfonyBridge\Config\ConfigBridge;
use Vigihdev\WpKernel\Service\DotEnvWpService;

final class WpKernel
{

    public static function boot(
        string $basePath,
        string $configDir = 'config',
        bool $enableAutoInjection = true,
        array $loadEnvPaths = []
    ) {

        $dir = Path::join($basePath, $configDir);
        if (!is_dir($dir)) {
            throw new \RuntimeException("Direktori konfigurasi tidak ditemukan: {$dir}.");
        }

        $dotEnv = new DotEnvWpService();
        $dotEnv->boot();

        ConfigBridge::boot(
            basePath: $basePath,
            configDir: $configDir,
            enableAutoInjection: $enableAutoInjection,
            loadEnvPaths: $loadEnvPaths
        );
    }
}
