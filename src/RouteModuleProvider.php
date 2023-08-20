<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

use function sprintf;

final class RouteModuleProvider extends ServiceProvider
{
    public const CONFIG_FILE = 'route-modules';

    public function boot(): void
    {
        $this->publishRoutes();

        $config = sprintf('config/%s.php', self::CONFIG_FILE);

        $this->publishes(
            [sprintf('%s/../%s', __DIR__, $config) => base_path($config)]
        );
    }

    private function publishRoutes(): void
    {
        $provider = new ModuleProvider($this->app->make('config'));
        $grouper  = new RouteGrouper($provider);

        $grouper->routeModules()
                ->each(
                    fn(RouteFile $route) => Route::middleware($route->middleware())
                                                 ->prefix($route->prefix())
                                                 ->group($route->path())
                );
    }
}
