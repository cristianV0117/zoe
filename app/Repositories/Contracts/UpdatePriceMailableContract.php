<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Repositories\Mailer\UpdatePriceValueObject;

interface UpdatePriceMailableContract
{
    public function mail(UpdatePriceValueObject $updatePriceValueObject): void;
}
