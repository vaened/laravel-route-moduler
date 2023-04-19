<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler\Tests;

use Illuminate\Encryption\MissingAppKeyException;
use Illuminate\Support\Facades\Route;

final class RouteModuleTest extends TestCase
{
    public function test_api_routes_was_loaded(): void
    {
        $this->get('/api/attentions/list')
            ->assertJson([1, 2, 3]);

        $this->assertTrue(Route::has('api.attentions.list'));
    }

    public function test_web_routes_was_loaded(): void
    {
        $this->assertTrue(Route::has('attentions.list'));
        $this->expectException(MissingAppKeyException::class);
        $this->get('/attentions/list')
            ->assertJson([1, 2, 3]);

    }
}
