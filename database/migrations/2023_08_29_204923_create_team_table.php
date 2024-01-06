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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 100);
            $table->string('designation', 100);
            $table->string('telephone', 100);
            $table->string('mobile', 100);
            $table->string('email', 100)->unique();
            $table->string('facebook_id', 100)->nullbale();
            $table->string('twitter_id', 100)->nullbale();
            $table->string('pinterest_id', 100)->nullbale();
            $table->text('profile')->nullbale();
            $table->string('team_img', 100)->nullbale();
            $table->string('status', 100);
            $table->integer('created_by')->nullbale();
            $table->integer('updated_by')->nullbale();
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
        Schema::dropIfExists('team');
    }
};
