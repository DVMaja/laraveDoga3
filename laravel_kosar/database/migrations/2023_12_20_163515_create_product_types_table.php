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
        Schema::create('product_types', function (Blueprint $table) {
            $table->id('type_id');
            $table->string('name');
            $table->longText('description');
            $table->integer('cost')->default(200);
            $table->timestamps();
        });

        DB::table('product_types')->insert([
            
            [
                'name' => 'dolog 1'
                ,'description' => 'asdwfgtrlbhöktpojbztjoh,jzbtpo,ujbpot'               
                ,'cost' => 200
            ],

            [
                'name' => 'book'
                ,'description' => 'Bookok Okok'               
                ,'cost' => 1234
            ],
            [
                'name' => 'Book'
                ,'description' => 'Bookok Okok'               
                ,'cost' => 1234
            ],

            [
                'name' => 'bbbbbbbbbbbbbbbbbbbbbbbb'
                ,'description' => 'Bookok Okok'               
                ,'cost' => 1234
            ],
                  
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_types');
    }
};
