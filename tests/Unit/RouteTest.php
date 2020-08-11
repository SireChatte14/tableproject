<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get("admin/load-events");
       $response->assertStatus(200);
    }
}
