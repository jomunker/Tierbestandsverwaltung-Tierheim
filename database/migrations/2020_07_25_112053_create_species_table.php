<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema for a species table
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('species', 30);
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        DB::unprepared(File::get(base_path() . '/database/seeds/species.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
