<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema for a animal table
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->date('birth_date')->nullable();
            $table->string('gender', 1);
            $table->foreignId('breed_id')->constrained()->onDelete('cascade');
            $table->string('colors', 40);
            $table->string('size', 10);
            $table->text('description')->nullable();
            $table->date('admission_date');
            $table->boolean('mediated');
            $table->boolean('castrated');
            $table->timestamps();
            $table->string('animal_picture');
        });

        DB::unprepared(File::get(base_path() . '/database/seeds/animals.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
