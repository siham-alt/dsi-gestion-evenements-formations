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
        Schema::create('inscription_evs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evenement_id'); // Corrected spelling
            $table->unsignedBigInteger('user_id');
            $table->string('nom');
            $table->string('email');
            $table->timestamp('date_inscription');
            $table->timestamps();

            // Corrected spelling in the foreign key definition
            $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription_evs');
    }
};
