<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class APIDisburseTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post(route('disbursement.create'), [
            //isi parameter sesuai kebutuhan request
            'bank_code' => "bni",
            'account_number' => $this->faker->words(9, true),
            'amount' => $this->faker->randomNumber(5),
            'remark' => $this->faker->words(9, true),
        ]);

        $response->assertStatus(200);
    }
}
