<?php

declare(strict_types=1);

namespace App\Providers;

use App\Jobs\GetAllPrices;
use App\Repositories\Contracts\PricesRepositoriesContract;
use App\Repositories\Contracts\UpdatePriceMailableContract;
use App\Repositories\Eloquent\PricesRepositories;
use App\Repositories\Mailer\UpdatePriceMailable;
use Illuminate\Support\ServiceProvider as Service;

final class DependencyServiceProvider extends Service
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(PricesRepositoriesContract::class, PricesRepositories::class);
        $this->app->bind(UpdatePriceMailableContract::class, UpdatePriceMailable::class);
        $this->app->bind(GetAllPrices::class);
    }
}
