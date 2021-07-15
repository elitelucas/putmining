<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->datetime('action_date')->useCurrent();
            $table->string('action')->nullable();            
            $table->string('ip')->nullable();
            $table->string('location')->nullable();
            $table->string('last_subscriber_type')->nullable();
            $table->boolean('last_notify_on_home')->nullable();
            $table->boolean('last_notify_on_paid')->nullable();
            $table->string('last_email')->nullable();
            $table->string('last_password')->nullable();
            $table->datetime('last_email_verification_date')->nullable();
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
        Schema::dropIfExists('histories');
    }
}
