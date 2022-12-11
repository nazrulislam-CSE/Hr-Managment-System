<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankings', function (Blueprint $table) {
            $table->id();
            $table->string('holder_name', 150)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('account_no', 255)->nullable();
            $table->string('opening_balance', 255)->nullable();
            $table->string('phone', 50)->unique()->nullable();
            $table->text('address')->nullable();
            $table->unsignedTinyInteger('status')->default(1)->comment('1=>Active, 0=>Inactive')->nullable();
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
        Schema::dropIfExists('bankings');
    }
}
