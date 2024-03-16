<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            
            $table->string('name')->nullable();
            $table->string('nip')->unique();
            $table->integer('year_birth')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->string('religion')->nullable();
            $table->boolean('status');
            $table->string('id_card_photo')->nullable();
            $table->foreignId('position_id')->constrained();
            
            $table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
}
