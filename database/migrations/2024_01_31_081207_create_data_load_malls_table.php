<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_load_malls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('load_id')->unsigned()->nullable();
            $table->decimal('longitude', 9, 7)->nullable()->comment('X');
            $table->decimal('latitude', 9, 7)->nullable()->comment('Y');
            $table->date('day')->nullable();
            $table->time('time')->nullable();
            $table->decimal('flow_sensor', 6, 3)->nullable();
            $table->decimal('volumen', 6, 3)->nullable();
            $table->boolean('updated_chart')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_load_malls');
    }
};
