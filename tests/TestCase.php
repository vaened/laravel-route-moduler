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
            ->set('route-moduler', [
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
            ]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            RouteModuleProvider::class,
        ];
    }
}
