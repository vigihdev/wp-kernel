<?php

declare(strict_types=1);

namespace Vigihdev\WpKernel\Service;

use InvalidArgumentException;
use Vigihdev\WpKernel\Contracts\ServiceManagerInterface;

final class ServiceManager implements ServiceManagerInterface
{

    /**
     * @param array<string,object> $configs
     * @return void
     */
    public function __construct(
        private readonly array $configs
    ) {}


    /**
     *
     * @param string $name
     * @return object|null
     * @throws InvalidArgumentException
     */
    public function getService(string $name): ?object
    {
        if (! $this->hasService($name)) {
            throw new InvalidArgumentException("Service {$name} tidak tersedia");
        }
        return $this->configs[$name];
    }

    /**
     *
     * @return array<int, string> Daftar nama service.
     */
    public function getAvailableServiceNames(): array
    {
        return array_keys($this->configs);
    }

    /**
     *
     * @param string $name Nama service.
     * @return bool True jika tersedia, false jika tidak.
     */
    public function hasService(string $name): bool
    {
        return isset($this->configs[$name]);
    }
}
