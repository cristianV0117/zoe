<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Repositories\Contracts\PricesRepositoriesContract;
use App\Repositories\Contracts\UpdatePriceMailableContract;
use App\Repositories\Mailer\UpdatePriceValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class GetAllPrices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly PricesRepositoriesContract $pricesRepositoriesContract,
        private readonly UpdatePriceMailableContract $updatePriceMailableContract
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $status = $this->pricesRepositoriesContract->updatePricesWithAbcInformation();
        array_map(function ($value) {
            $this->updatePriceMailableContract->mail(new UpdatePriceValueObject($value));
        }, $status);
        /*
         * status contiene el arreglo con el response de cada update realizado dependiendo de la
         * informacion que proporciona ABC
         * en este caso se podría ejecutar un evento el cual almacene dichos logs
         * o llamar un caso de uso distinto que implemente otro metodo de nuestro repositorio
         */
    }
}
