<?php

namespace Tests\Unit;

use Tests\TestCase;

class CheckPathTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/'); //patikriname ar veikia sis linkas - to mes tikimes
        $response->assertStatus(200); //tikimes gauti ok(200) status
    }
}
