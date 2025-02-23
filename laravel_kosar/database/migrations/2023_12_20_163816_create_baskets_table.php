<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('baskets', function (Blueprint $table) {
            //a primary... nem hozza létre a mezőket...
            $table->primary(['user_id', 'item_id']);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('item_id')->references('item_id')->on('products');
            $table->timestamps();
        });


        DB::table('baskets')->insert([

            [
                'item_id' => 1, 'user_id' => 1

            ],
            [
                'item_id' => 2, 'user_id' => 1

            ],
            [
                'item_id' => 1, 'user_id' => 2

            ],
            [
                'item_id' => 3, 'user_id' => 1

            ],
            [
                'item_id' => 4, 'user_id' => 1
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baskets');
    }
};
