<?php

declare(strict_types=1);

namespace Vigihdev\WpKernel\Contracts;

interface ServiceManagerInterface
{


    public function getService(string $name): ?object;

    /**
     * Mendapatkan daftar nama service koneksi yang tersedia.
     *
     * @return array<int, string> Daftar nama service.
     */
    public function getAvailableServiceNames(): array;

    /**
     * Memeriksa apakah service koneksi tersedia.
     *
     * @param string $name Nama service.
     * @return bool True jika tersedia, false jika tidak.
     */
    public function hasService(string $name): bool;
}
