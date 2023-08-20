<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

namespace Vaened\LaravelRouteModuler\Tests;

use Illuminate\Encryption\MissingAppKeyException;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function test_module_was_loaded(): void
    {
        $this->get('/module/list')
             ->assertJson([1, 2, 3]);
    }

    #[Test]
    public function test_prefixed_module_was_loaded(): void
    {
        $this->get('/prefixed/list')
             ->assertJson([1, 2, 3]);
    }
}
