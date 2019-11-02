<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_path')->nullable();
            $table->string('name');
            $table->string('career')->nullable;
            $table->text('style')->nullable;
            $table->text('counseling')->nullable;
            $table->string('shopname');
            $table->string('url');
            $table->string('address');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}