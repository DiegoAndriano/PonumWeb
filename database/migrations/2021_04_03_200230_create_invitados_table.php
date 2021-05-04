<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitadosTable extends Migration
{
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->id();
            $table->string('passcode');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitados');
    }
}
