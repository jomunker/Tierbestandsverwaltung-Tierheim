<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema for a department table
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department', 30);
            $table->string('contact_name', 30);
            $table->string('contact_surname', 30);
            $table->string('contact_telefon', 15);
            $table->timestamps();
        });

        DB::unprepared(File::get(base_path() . '/database/seeds/departments.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
