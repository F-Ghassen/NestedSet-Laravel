<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_relations', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->foreign('parent_id')->references('id')->on('article_relations')->onUpdate('cascade')->onDelete('cascade');
            $table->morphs('relation');
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
        Schema::dropIfExists('article_relations');
    }
}
