<?php

declare(strict_types=1);

namespace Vigihdev\WpKernel\Service;

use RuntimeException;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Filesystem\Path;

final class DotEnvWpService
{

    public function __construct() {}

    public function boot(): void
    {
        $this->hasDefined('ABSPATH', 'WPINC', 'WP_CONTENT_DIR', 'WP_CONTENT_URL', 'STYLESHEETPATH');
        $env = new Dotenv();
        $env->usePutenv(true);
        $env->populate([
            'ABSPATH' => ABSPATH,
            'WPINC' => Path::join(ABSPATH, WPINC),
            'WP_ADMIN' => Path::join(ABSPATH, 'wp-admin'),
            'WP_CONTENT_DIR' => WP_CONTENT_DIR,
            'WP_CONTENT_URL' => WP_CONTENT_URL,
            'STYLESHEETPATH' => STYLESHEETPATH,
            'SITE_URL' =>  get_site_url(),
            'STYLESHEET_URI' =>  get_stylesheet_uri(),
        ]);
    }

    private function hasDefined(...$constants): void
    {
        foreach ($constants as $name) {
            if (!defined($name)) {
                throw new RuntimeException("Erorr const {$name} tidak di definisikan");
            }
        }
    }
}
