<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obatalkes_m', function (Blueprint $table) {
            $table->id('obatalkes_id');
            $table->string('obatalkes_kode')->nullable();
            $table->string('obatalkes_nama')->nullable();
            $table->decimal('stok', 11,2)->nullable();
            $table->text('additional_data')->nullable();
            $table->dateTime('created_date');
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->integer('modified_count')->nullable();
            $table->dateTime('last_modified_date')->nullable();
            $table->foreignId('last_modified_by')->nullable();
            $table->tinyInteger('is_deleted')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->dateTime('deleted_date')->nullable();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obatalkes_m');
    }
};
