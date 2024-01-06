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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('author_id');
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->string('availability', 100)->nullbale();
            $table->string('price', 100);
            $table->string('rating', 100);
            $table->string('publisher', 100);
            $table->string('country_of_publisher', 100)->nullbale();
            $table->string('isbn', 100)->nullbale();
            $table->string('isbn-10', 100)->nullbale();
            $table->string('audience', 100)->nullbale();
            $table->string('format', 100)->nullbale();
            $table->string('language', 100)->nullbale();
            $table->string('total_pages', 100);
            $table->string('downloaded', 100)->nullbale();
            $table->string('edition_number', 100);
            $table->string('recommended', 100)->nullbale();
            $table->text('Description');
            $table->string('book_img', 100);
            $table->string('book_upload', 100);
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
        Schema::dropIfExists('books');
    }
};
