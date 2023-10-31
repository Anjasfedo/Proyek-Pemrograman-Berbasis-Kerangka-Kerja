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
        Schema::table('books', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Penulis::class, 'penulis_id')->nullable()->after('id')->constrained()->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Menghapus foreign key dan kolom penulis_id
            $table->dropForeign(['penulis_id']);
            $table->dropColumn('penulis_id');
        });
    }
};
