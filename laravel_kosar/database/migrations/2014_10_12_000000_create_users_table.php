<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('balance');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            
            [
                'name' => 'Vásárló'
                ,'email' => 'vasarlo@gmail.com'
                ,'password' => Hash::make('Aa123@')
                ,'balance' => 15000
            ],

            [
                'name' => 'Vásárló2'
                ,'email' => 'vasarlo2@gmail.com'
                ,'password' => Hash::make('Aa123@')
                ,'balance' => 40000
            ],
                        
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
