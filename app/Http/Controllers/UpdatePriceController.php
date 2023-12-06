<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\Contracts\PricesRepositoriesContract;
use App\Repositories\Contracts\UpdatePriceMailableContract;
use App\Repositories\Mailer\UpdatePriceValueObject;
use Illuminate\Http\Request;

final class UpdatePriceController extends Controller
{
    public function __construct(
        private readonly PricesRepositoriesContract $pricesRepositoriesContract,
        private readonly UpdatePriceMailableContract $updatePriceMailableContract
    ) {}

    public function __invoke(Request $request): void
    {
        $response = $this->pricesRepositoriesContract->updatePriceInformation($request->toArray());
        $this->updatePriceMailableContract->mail(new UpdatePriceValueObject($response));
    }
}
