<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->decimal('maps_lat', 10, 8)->nullable()->after('logo');
            $table->decimal('maps_lng', 11, 8)->nullable()->after('maps_lat');
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn(['maps_lat', 'maps_lng']);
        });
    }
};
