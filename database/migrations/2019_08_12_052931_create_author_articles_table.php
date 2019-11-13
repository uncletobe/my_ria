<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('author_id');

            $table->string('article_title');
            $table->string('article_slug')->unique();
            $table->string('article_excerpt');

            $table->text('article_content_raw');
            $table->text('article_content_html');

            $table->string('article_picture_preview_path');

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();


            $table->unsignedBigInteger('views')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('author_articles', function ($table) {
            $table->index('is_published');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_articles');
    }
}
