<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Vaened\LaravelRouteModuler\RouteModuleProvider;

class TestCase extends BaseTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        $app->setBasePath(__DIR__);

        $app->make('config')
            ->set(RouteModuleProvider::CONFIG_FILE, [
                [
                    'path'       => 'routes/api',
                    'prefix'     => 'api',
                    'named'      => true,
                    'middleware' => []
                ],
                [
                    'path'       => 'routes/web',
                    'prefix'     => null,
                    'named'      => true,
                    'middleware' => ['web']
                ],
                [
                    'path'       => 'routes/module.php',
                    'prefix'     => null,
                    'named'      => true,
                    'middleware' => []
                ],
                [
                    'path'       => 'routes/module.php',
                    'prefix'     => 'prefixed',
                    'named'      => false,
                    'middleware' => []
                ],
            ]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            RouteModuleProvider::class,
        ];
    }
}
