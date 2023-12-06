<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;

class UpdatePriceByEndPointTest extends TestCase
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    /**
     * A basic feature test example.
     */
    public function test_if_update_price_by_endpoint_success(): void
    {
        $response = $this->post('api/prices', [
            "symbol" => "APPL",
            "price" => 188.97,
            "last_price_datetime" => "2023-10-30T17:31:18-04:00"
        ]);

        $response->assertStatus(200);
    }

    public function test_if_update_price_failed_by_symbol(): void
    {
        $response = $this->post('api/prices', [
            "symbol" => "ABCDE",
            "price" => 188.97,
            "last_price_datetime" => "2023-10-30T17:31:18-04:00"
        ]);

        $response->assertStatus(500);
    }
}
