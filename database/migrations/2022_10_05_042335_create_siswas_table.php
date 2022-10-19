<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nis');
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->foreignId('sekolah_id')->constrained('sekolah')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignIdFor(User::class);
            $table->timestamps();

            // $table->foreign('sekolah_id')->references('id')->on('sekolah')->cascadeOnDelete()->cascadeOnUpdate()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
