<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('precio');
            $table->foreignId('invitado_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('categoria_id')->nullable();
            $table->foreignId('metodo_pago_id')->nullable();
            $table->timestamp('comprado_at')->default(Carbon::now());
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
