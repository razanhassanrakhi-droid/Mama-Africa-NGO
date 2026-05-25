<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('contacts', function (Blueprint $table) {
        $table->id(); // رقم تلقائي

        $table->string('phone_number'); // رقم الهاتف

        $table->string('facebook_url')->nullable(); // رابط فيسبوك
        $table->string('tiktok_url')->nullable(); // رابط تيك توك

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
