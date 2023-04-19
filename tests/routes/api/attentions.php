<?php
/**
 * @author enea dhack <enea.so@live.com>
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('list', static fn() => [1, 2, 3])->name('api.attentions.list');