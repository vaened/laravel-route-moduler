# Laravel Route Moduler

[![Build Status](https://github.com/vaened/laravel-route-moduler/actions/workflows/tests.yml/badge.svg)](https://github.com/vaened/laravel-route-moduler/actions?query=workflow:Tests) [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](license)

Separate laravel routes by modules and submodules

```markdown
└── routes
    └── api
        └── clients.php
        └── payments.php
        └── store.php
```

## Installation

Laravel Route Moduler requires PHP 8.2. To get the latest version, simply require the project using Composer:

```bash
composer require vaened/laravel-route-moduler
```

Now. Publish the configuration file.

```bash
php artisan vendor:publish --tag='laravel-route-moduler'
```

## Usage

Once the library is installed, you can start organizing your routes within the /routes/modules folder, which is the default location. If you prefer a different location, you can update it in the [route-modules.php](./config/route-modules.php) configuration file.

```markdown
├── routes
    └── modules
```

### Multiple Modules
The [route-modules.php](./config/route-modules.php) configuration file returns an array for a single module setup. However, you can configure as many modules as you need by extending this array.
```markdown
└── routes
    └── api
    └── web
    └── app
```
This structure helps to keep your application’s routes organized, making maintenance and scalability easier.

## Configuration
You can customize the behavior of the `laravel-route-moduler` package through the route-modules.php configuration file. Below are the available options:

• **path**: Specifies where the route configuration files for the module are located. You can set this to a directory or a single file.

	Example:
		Load all routes in a directory: 'path' => 'routes/modules'
		Single route file: 'path' => 'routes/users.php'

• **prefix**: Adds a prefix to the module path when the module is created, helping to make modules independent and supplement filename prefixes.

	Example: 
		'prefix' => 'admin'

• **named**: If true, the route file name will be used as a prefix for the routes defined in that file.

	Example: 
		If the file is users.php, all routes will be prefixed with users.

• **middleware**: Defines the default middleware applied to all routes registered by the module.

	Example: 
		'middleware' => ['web', 'auth']

These settings allow you to tailor the package to your application’s specific routing needs.

## License

This library is licensed under the MIT License. For more information, please see the [`license`](./license) file.