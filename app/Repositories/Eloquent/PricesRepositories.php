<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

use App\Models\SecurityPrice;
use App\Repositories\Contracts\PricesRepositoriesContract;
use App\Shared\Prices;

final class PricesRepositories implements PricesRepositoriesContract
{
    use Prices;

    public function __construct(
        private readonly SecurityPrice $securityPrice
    ) {}

    public function updatePricesWithAbcInformation(): array
    {
        return array_map(function ($value) {
            $response = $this->securityPrice->whereHas('security', function ($query) use ($value) {
                $query->where('symbol', '=', $value['symbol']);
            });
            $updateInformation = $response->update([
                'last_price' => $value['price'],
                'as_of_date' => $value['last_price_datetime']
            ]);
            return self::ensureIfUpdate($updateInformation, $value["symbol"]);
        }, self::abcPrices()['results']);
    }
}
