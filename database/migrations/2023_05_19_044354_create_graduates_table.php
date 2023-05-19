<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('graduates', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('email');
			$table->string('telephone_number');
			$table->string('company');
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('graduates');
	}
};
