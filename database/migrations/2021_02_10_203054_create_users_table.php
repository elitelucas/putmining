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
            $table->string('email')->unique();
            $table->datetime('registration_date')->useCurrent();
            $table->boolean('email_verified')->default(0);
            $table->date('email_verified_date')->nullable();
            $table->string('verify_link')->nullable();
            $table->datetime('verify_expiry_date')->nullable();
            $table->string('password')->nullable();
            $table->string('passwordreset_link')->nullable();
            $table->datetime('passwordreset_expiry_date')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->boolean('notify_on_home')->default(1);
            $table->boolean('notify_on_paid')->default(1);
            $table->date('expiry_date')->nullable();
            $table->boolean('blocked')->default(0);
            $table->string('bio')->nullable();
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
