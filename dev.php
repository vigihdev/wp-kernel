<?php

use Symfony\Component\Filesystem\Path;
use VigihDev\SymfonyBridge\Config\Service\ServiceLocator;
use Vigihdev\WpKernel\WpKernel;

error_reporting(-1);

require __DIR__ . '/vendor/autoload.php';

echo "Server " . __FILE__ . "</br>";

$testPathWp = Path::join(getenv('HOME') ?? '', 'Sites', 'okkarent-group', 'okkarentorg');
$testFilesWp = ['wp-blog-header.php', 'wp-load.php'];

foreach ($testFilesWp as $file) {
    $file = Path::join($testPathWp, $file);
    if (is_file($file)) {
        require $file;
    }
}

WpKernel::boot(basePath: __DIR__, configDir: 'config', enableAutoInjection: true);

var_dump(
    ServiceLocator::getParameter('ABSPATH'),
    getenv('WP_ADMIN'),
);
