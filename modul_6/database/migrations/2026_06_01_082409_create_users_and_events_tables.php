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
        Schema::table('users', function (Blueprint $table) {
            $table->string('img_path')->nullable()->after('name');
            $table->string('nim')->unique()->after('img_path');
            $table->string('major')->after('nim');
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('img_path');
            $table->string('title');
            $table->text('description');
            $table->string('url')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['img_path', 'nim', 'major']);
        });
    }
};
