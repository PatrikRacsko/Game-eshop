<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProductTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
        DB::table('product_tests')->insert([
            'name' => 'Product 1',
            'description' => 'Description of product 1'
        ]);
        
        DB::table('product_tests')->insert([
            'name' => 'Product 2',
            'description' => 'Description of product 2'
        ]);
      
        DB::table('product_tests')->insert([
            'name' => 'Product 3',
            'description' => 'Description of product 3'
        ]);
     
        DB::table('product_tests')->insert([
            'name' => 'Product 4',
            'description' => 'Description of product 4'
        ]);
     
        DB::table('product_tests')->insert([
            'name' => 'Product 5',
            'description' => 'Description of product 5'
        ]);
      
        DB::table('product_tests')->insert([
            'name' => 'Product 6',
            'description' => 'Description of product 6'
        ]);
      
        DB::table('product_tests')->insert([
            'name' => 'Product 7',
            'description' => 'Description of product 7'
        ]);
      
        DB::table('product_tests')->insert([
            'name' => 'Product 8',
            'description' => 'Description of product 8'
        ]);
      
        DB::table('product_tests')->insert([
            'name' => 'Product 9',
            'description' => 'Description of product 9'
        ]);
      
        DB::table('product_tests')->insert([
            'name' => 'Product 10',
            'description' => 'Description of product 10'
        ]);   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_tests');
    }
}
