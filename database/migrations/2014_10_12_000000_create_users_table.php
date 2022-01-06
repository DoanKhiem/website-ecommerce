<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();//unique chỉ định rằng các giá trị của nó phải là duy nhất.
            $table->string('password');
            $table->string('address');
            $table->string('phone');
            $table->text('avatar')->nullable(); //nullable cho phép các giá trị NULL được chèn vào cột.
            $table->tinyInteger('sex')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
