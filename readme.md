# WP Kernel - WordPress Enterprise Framework

![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue)
![License](https://img.shields.io/badge/License-MIT-green)
![WordPress](https://img.shields.io/badge/WordPress-Kernel%20Framework-orange)

WP Kernel adalah framework WordPress enterprise yang menyediakan fondasi solid untuk pengembangan WordPress tingkat lanjut dengan dependency injection, service container, dan arsitektur modular.

## ✨ Fitur Utama

- 🏗️ **Arsitektur Modular** - Struktur code yang terorganisir dan scalable
- 💉 **Dependency Injection** - Manajemen dependensi yang powerful
- 🛠️ **Service Container** - Container layanan modern untuk WordPress
- 📁 **PSR-4 Autoloading** - Standar autoloading modern
- 🧪 **Testing Ready** - Siap untuk pengujian dengan PHPUnit
- 🔧 **Konfigurasi Fleksibel** - Bridge konfigurasi Symfony
- 📦 **Composer Ready** - Package management yang modern

## 📋 Requirements

- PHP 8.1 atau lebih tinggi
- WordPress 6.0 atau lebih tinggi
- Composer

## 🚀 Instalasi

### Via Composer

```bash
composer require vigihdev/wp-kernel
```

### Manual Installation

1. Clone repository ini ke dalam `wp-content/plugins/` atau `wp-content/mu-plugins/`:

```bash
git clone https://github.com/vigihdev/wp-kernel.git
```

2. Install dependencies:

```bash
composer install
```

## 🏁 Quick Start

### Inisialisasi Kernel

```php
<?php
// Dalam file plugin utama atau mu-plugin

use Vigihdev\WpKernel\Kernel;

require_once __DIR__ . '/vendor/autoload.php';

$kernel = new Kernel();
$kernel->boot();
```

### Mendefinisikan Service

```php
<?php

use Vigihdev\WpKernel\Container\Container;
use Vigihdev\WpKernel\Attributes\Service;

#[Service]
class MyCustomService
{
    public function __construct(
        private Container $container
    ) {}

    public function doSomething(): string
    {
        return 'Hello from WP Kernel!';
    }
}
```

### Menggunakan Service

```php
<?php

$service = $kernel->getContainer()->get(MyCustomService::class);
echo $service->doSomething(); // Output: Hello from WP Kernel!
```

## 📁 Struktur Direktori

```
wp-kernel/
├── src/
│   ├── Container/          # Service Container
│   ├── Attributes/         # PHP Attributes
│   ├── Config/            # Konfigurasi
│   └── Kernel.php         # Kernel utama
├── tests/                 # Test suites
├── vendor/               # Composer dependencies
└── composer.json         # Konfigurasi package
```

## 🔧 Konfigurasi

### Service Configuration

Buat file konfigurasi `config/services.php`:

```php
<?php

return [
    'services' => [
        MyCustomService::class => [
            'class' => MyCustomService::class,
            'tags' => ['app.service'],
        ],
    ],
];
```

### WordPress Hooks

```php
<?php

use Vigihdev\WpKernel\Attributes\Action;
use Vigihdev\WpKernel\Attributes\Filter;

class MyController
{
    #[Action('init')]
    public function onInit(): void
    {
        // Kode yang dijalankan pada hook 'init'
    }

    #[Filter('the_content')]
    public function filterContent(string $content): string
    {
        return $content . '<p>Powered by WP Kernel</p>';
    }
}
```

## 🧪 Testing

Jalankan test suite:

```bash
# Unit tests
composer test

# Test coverage
composer test:coverage

# Development server
composer dev
```

## 📦 Dependencies

### Required

- `vigihdev/serializer` - Serialization utilities
- `vigihdev/symfony-bridge-config` - Symfony config bridge

### Development

- `phpunit/phpunit` - Testing framework

## 🔄 Development

### Contributing

1. Fork repository ini
2. Buat feature branch (`git checkout -b feature/amazing-feature`)
3. Commit perubahan Anda (`git commit -m 'Add some amazing feature'`)
4. Push ke branch (`git push origin feature/amazing-feature`)
5. Buat Pull Request

### Development Setup

```bash
# Clone repository
git clone https://github.com/vigihdev/wp-kernel.git

# Install dependencies
composer install

# Run tests
composer test

# Start development server
composer dev
```

## 📄 License

WP Kernel dirilis di bawah lisensi MIT. Lihat file [LICENSE](LICENSE) untuk detail lengkap.

## 🤝 Support

Jika Anda menemukan bug atau memiliki pertanyaan, silakan buat [issue](https://github.com/vigihdev/wp-kernel/issues) di GitHub.

## 🔗 Links

- [Documentation](https://github.com/vigihdev/wp-kernel/wiki)
- [Issues](https://github.com/vigihdev/wp-kernel/issues)
- [Releases](https://github.com/vigihdev/wp-kernel/releases)

---

**Dibuat dengan ❤️ oleh Vigih Dev**
