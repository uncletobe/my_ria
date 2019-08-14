<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_articles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('article_title');
            $table->string('article_slug')->unique();
            $table->string('article_excerpt');

            $table->text('article_content_raw');
            $table->text('article_content_html');

            $table->string('article_picture_preview_path');
            $table->string('alt');

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->boolean('is_main_news')->default(false);

            $table->boolean('is_recommend')->default(false);
            $table->unsignedBigInteger('views')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('news_articles', function ($table) {
            $table->index('is_published');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_articles');
    }
}
