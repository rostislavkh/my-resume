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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_uk')->nullable();
            $table->text('description');
            $table->text('description_uk')->nullable();
            $table->boolean('is_view_all')->default(true);

            
            $table->boolean('is_view_top')->default(true);
            $table->string('background_color')->nullable();
            $table->string('shadow_color')->nullable();
            $table->string('text_color')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
