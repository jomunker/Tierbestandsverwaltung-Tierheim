<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        });
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
