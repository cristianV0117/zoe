<?php

namespace Tests\Feature;

use Tests\TestCase;

class EmailConnectionTest extends TestCase
{
    public function test_if_connection_smtp_is_working(): void
    {
        $response = $this->post('api/prices', [
            "symbol" => "APPL",
            "price" => 188.97,
            "last_price_datetime" => "2023-10-30T17:31:18-04:00"
        ]);

        $response->assertStatus(200);
    }
}
