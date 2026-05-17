<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('sa_id_number');
            $table->string('mobile_number');
            $table->string('email_address');
            $table->date('birth_date');
            $table->string('language');
            $table->text('interests');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
