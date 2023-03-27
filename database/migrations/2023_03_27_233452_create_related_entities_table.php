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
        Schema::create('related_entities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_id')->constrained();
            $table->unsignedBigInteger('related_entity_id')->index();
            $table->foreign('related_entity_id')->on('entities')
            ->references('id')->onDelete('cascade');
            $table->string('entity_type_name');
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
        Schema::dropIfExists('related_entities');
    }
};
