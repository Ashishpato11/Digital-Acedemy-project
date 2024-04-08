<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['admin','instructor','user'])->default('user');
            $table->enum('status',['active','inacive',])->default('active');
            $table->enum('gender',['M','F','O'])->nullable();
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
        // for instructor
                $table->text('qualification')->nullable();
                $table->text('skill')->nullable();
                $table->text('workexperience')->nullable();
                $table->text('facebook')->nullable();
                $table->text('twiter')->nullable();
                $table->text('instagram')->nullable();
                $table->text('linkdin')->nullable();
               

        //for user
        $table->text('interest')->nullable();


            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
