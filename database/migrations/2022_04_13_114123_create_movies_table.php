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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('media_type');
            $table->string('name')->index();
            $table->string('short_name');
            $table->text('long_description');
            $table->text('short_description');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->string('review_url');
            $table->string('review_score');
            $table->string('slug');
            $table->string('genres');
            $table->string('created_by');
            $table->string('published_by')->index();
            $table->string('franchises');
            $table->string('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
