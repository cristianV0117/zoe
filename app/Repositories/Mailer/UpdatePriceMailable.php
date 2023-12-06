<?php

declare(strict_types=1);

namespace App\Repositories\Mailer;

use App\Repositories\Contracts\UpdatePriceMailableContract;
use Illuminate\Support\Facades\Mail;

final class UpdatePriceMailable implements UpdatePriceMailableContract
{
    public function mail(UpdatePriceValueObject $updatePriceValueObject): void
    {
        $response = Mail::to($updatePriceValueObject->object()->to)
            ->send(new CustomEmail($updatePriceValueObject->object()));
    }
}
