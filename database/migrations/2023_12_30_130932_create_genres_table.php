<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name_genre');
            $table->timestamps();
        });
        DB::table('genres')->insert([
            'name_genre' => 'Homme',
        ]);
        DB::table('genres')->insert([
            'name_genre' => 'Femme',
        ]);
        DB::table('genres')->insert([
            'name_genre' => 'Homme et Femme',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
