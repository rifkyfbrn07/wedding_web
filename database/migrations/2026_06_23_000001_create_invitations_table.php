<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // e.g. ikko-fadhly
            $table->string('bride_name');
            $table->string('bride_father')->nullable();
            $table->string('bride_mother')->nullable();
            $table->string('groom_name');
            $table->string('groom_father')->nullable();
            $table->string('groom_mother')->nullable();
            $table->dateTime('akad_start_at');
            $table->dateTime('akad_end_at');
            $table->dateTime('reception_start_at');
            $table->dateTime('reception_end_at');
            $table->string('venue_name');
            $table->text('venue_address');
            $table->string('maps_url')->nullable();
            $table->string('music_path')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('bride_photo')->nullable();
            $table->string('groom_photo')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
