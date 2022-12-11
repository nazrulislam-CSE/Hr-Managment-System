<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->date('date_birth', 100)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->date('joing_date', 100)->nullable();
            $table->integer('joing_salary')->nullable();
            $table->string('username', 150)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('address', 100)->nullable();
            $table->string('expense', 100)->nullable();
            $table->string('employe_image')->nullable();
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
        Schema::dropIfExists('employes');
    }
}
