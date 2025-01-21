<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared(file_get_contents(database_path('data/pac-dump.sql')));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
