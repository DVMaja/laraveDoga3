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
        Schema::create('products', function (Blueprint $table) {
            $table->id('item_id');
            $table->foreignId('type_id')->references('type_id')->on('product_types');
            $table->date('date');
            $table->integer('quantity')->default(10);
            $table->timestamps();
        });

        DB::table('products')->insert([

            [
                'type_id' => 1, 'date' => '2024-01-26'

            ],

            [
                'type_id' => 1, 'date' => '2024-02-10'

            ],

            [
                'type_id' => 2, 'date' => '2024-02-13'

            ],

            [
                'type_id' => 3, 'date' => '2024-01-13'

            ],
            [
                'type_id' => 4, 'date' => '2024-01-13'

            ],
            [
                'type_id' => 3, 'date' => '2024-01-13'

            ],
            [
                'type_id' => 4, 'date' => '2024-01-13'

            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
