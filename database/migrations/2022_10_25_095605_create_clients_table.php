<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('gender', 150)->nullable();
            $table->string('date', 100)->nullable();
            $table->string('username', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('address', 100)->nullable();
            $table->string('client_image')->nullable();
            $table->unsignedTinyInteger('status')->default(1)->comment('1=>Active, 0=>Inactive');
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
        Schema::dropIfExists('clients');
    }
}
