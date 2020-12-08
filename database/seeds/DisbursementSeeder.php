<?php

use Illuminate\Database\Seeder;

class DisbursementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\Model\Disbursement::class, 10)->create();
    }
}
