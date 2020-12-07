<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisbursementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disbursements', function (Blueprint $table) {
            $table->id();
            $table->string('id_api')->nullable();
            $table->string('status')->nullable();
            $table->double('amount', 20, 4)->nullable();
            $table->dateTime('timestamp')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('account_number')->nullable();
            $table->string('beneficiary_name')->nullable();
            $table->text('remark')->nullable();
            $table->text('receipt')->nullable();
            $table->string('time_served')->nullable();
            $table->double('fee', 20, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disbursements');
    }
}
