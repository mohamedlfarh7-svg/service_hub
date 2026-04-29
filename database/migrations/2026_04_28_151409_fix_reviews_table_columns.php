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
    Schema::table('reviews', function (Blueprint $table) {
        if (!Schema::hasColumn('reviews', 'service_id')) {
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
        }
       
        if (!Schema::hasColumn('reviews', 'rating')) {
            $table->integer('rating')->default(5);
        }

        if (!Schema::hasColumn('reviews', 'comment')) {
            $table->text('comment')->nullable();
        }
    });
}

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropColumn(['service_id', 'rating', 'comment']);
        });
    }


};
