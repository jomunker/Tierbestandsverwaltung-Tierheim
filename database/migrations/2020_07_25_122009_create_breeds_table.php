<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema for a breeds table
        Schema::create('breeds', function (Blueprint $table) {
            $table->id();
            $table->string('breed', 40);
            $table->foreignId('species_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        DB::unprepared(File::get(base_path() . '/database/seeds/breeds.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breeds');
    }
}
