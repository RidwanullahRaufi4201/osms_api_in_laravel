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
        Schema::create('assign_works', function (Blueprint $table) {
            $table->id();
            $table->string('requestInfo');
            $table->string("description");
            $table->string("name");
            $table->string("addressOne");
            $table->string("addressTwo");
            $table->string("city");
            $table->string("state");
            $table->integer("zip");
            $table->string("email");
            $table->integer("mobile");
            $table->string("date");
            $table->foreignId('technicain_id')->references('id')->on('technicains')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_works',function(Blueprint $table){
            $table->dropForeign('technicain_id');
        });
    
    }
};
