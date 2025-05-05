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
        Schema::create('m_c_qs', function (Blueprint $table) {
            $table->id();
            $table->string("question");
            $table->string("a");
            $table->string("b");
            $table->string("c");
            $table->string("d");
            $table->string("correct_ans");
            $table->string("admin_id");
            $table->string("quiz_id");
            $table->string("category_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_c_qs');
    }
};
