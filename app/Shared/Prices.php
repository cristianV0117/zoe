<?php

namespace App\Shared;

trait Prices
{
    public static array $updateStatus = [];

    public static function abcPrices(): array
    {
        return [
            "results" => [
                [
                    "symbol" => "APPL",
                    "price" => 188.97,
                    "last_price_datetime" => "2023-10-30T17:31:18-04:00"
                ],
                [
                    "symbol" => "TSLA",
                    "price" => 244.42,
                    "last_price_datetime" => "2023-10-30T17:32:11-04:00"
                ]
            ]
        ];
    }

    public static function ensureIfUpdate(?int $updateInformation, string $symbol): array
    {
        if (!$updateInformation) {
            return array_merge(self::$updateStatus, [
                'status' => false,
                'model' => $symbol,
                'message' => 'Ha ocurrido un error actualizando el dato o no existe'
            ]);
        }

        return array_merge(self::$updateStatus, [
            'status' => true,
            'model' => $symbol,
            'message' => 'Editado correctamente'
        ]);
    }
}
