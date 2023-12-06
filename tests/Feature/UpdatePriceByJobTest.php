<?php

namespace Tests\Feature;

use App\Jobs\GetAllPrices;
use App\Repositories\Contracts\PricesRepositoriesContract;
use App\Repositories\Contracts\UpdatePriceMailableContract;
use Mockery;
use Tests\TestCase;

class UpdatePriceByJobTest extends TestCase
{
    public function test_if_update_price_by_job_success(): void
    {
        $pricesRepositoryMock = Mockery::mock(PricesRepositoriesContract::class);
        $pricesRepositoryMock->shouldReceive('updatePricesWithAbcInformation')->once();
        $updatePriceMailableMock = Mockery::mock(UpdatePriceMailableContract::class);

        $this->app->instance(PricesRepositoriesContract::class, $pricesRepositoryMock);
        $this->app->instance(UpdatePriceMailableContract::class, $updatePriceMailableMock);

        $job = new GetAllPrices($pricesRepositoryMock, $updatePriceMailableMock);

        $result = $job->handle();

        $this->assertIsArray($result);
    }
}
