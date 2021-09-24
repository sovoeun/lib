<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/24/2021
 * Time: 12:26 PM
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CamdigikeyAuthorizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camdigikey_authorizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('request_token', 500);
            $table->string('access_token', 500);
            $table->text('user_info')->nullable();
            $table->text('full_response')->nullable();;
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
        Schema::dropIfExists('camdigikey_authorizations');
    }
}

