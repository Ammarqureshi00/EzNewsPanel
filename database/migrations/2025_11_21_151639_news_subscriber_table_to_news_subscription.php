<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Rename the table
        Schema::rename('news_subscriber', 'news_subscription');
    }

    public function down(): void
    {
        // Rename back if rollback is needed
        Schema::rename('news_subscription', 'news_subscriber');
    }
};
