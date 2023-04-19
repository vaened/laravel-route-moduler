<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Vaened\Support\Types\ArrayList;

final class RouteModuleProvider extends ServiceProvider
{
    public function boot(): void
    {
        $provider = new ModuleProvider($this->app->make('config'));
        $grouper  = new RouteGrouper($provider);

        ArrayList::from($grouper->routeModules())
            ->each(
                fn(RouteFile $route) => Route::middleware($route->middleware())
                    ->prefix($route->prefix())
                    ->group($route->path())
            );
    }
}
