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
        Schema::create('user_appliances', function(Blueprint $t){
  $t->id();
  $t->foreignId('user_id')->constrained()->onDelete('cascade');
  $t->foreignId('category_id')->constrained()->onDelete('cascade');
  $t->foreignId('item_type_id')->constrained('item_types')->onDelete('cascade');
  $t->foreignId('brand_id')->constrained()->onDelete('cascade');
  $t->foreignId('model_entry_id')->constrained()->onDelete('cascade');
  $t->foreignId('warranty_id')->constrained()->onDelete('cascade');
  $t->date('purchase_date');
  $t->date('next_service_date')->nullable();
  $t->string('location')->nullable();
  $t->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_appliances');
    }
};
