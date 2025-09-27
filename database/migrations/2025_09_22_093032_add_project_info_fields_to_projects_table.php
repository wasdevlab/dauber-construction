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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('location')->nullable()->after('content');
            $table->string('sector')->nullable()->after('location');
            $table->string('technology')->nullable()->after('sector');
            $table->string('scope_of_work')->nullable()->after('technology');
            $table->date('completion_date')->nullable()->after('scope_of_work');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['location', 'sector', 'technology', 'scope_of_work', 'completion_date']);
        });
    }
};
