<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate_schedules', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('blood_type_id')->unsigned()->nullable()
            ->foreignId('blood_type_id')->references('id')->on('blood_types')->onDelete('cascade');
            $table->string('amount');
            $table->BigInteger('user_id')->unsigned()->nullable()
            ->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('verfied')->default(false);
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
        Schema::dropIfExists('donate_schedules');
    }
};
