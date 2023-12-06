<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

interface PricesRepositoriesContract
{
    public function updatePricesWithAbcInformation(): array;

    public function updatePriceInformation(array $request): array;
}
