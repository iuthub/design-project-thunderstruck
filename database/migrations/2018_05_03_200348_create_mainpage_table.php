<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainpageTable extends Migration
{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
				Schema::create('MainPage', function (Blueprint $table) {
						$table->increments('id');
						
						$table->string("title");                    // Main title of the site
						$table->string("description");              // Main description of the page
						
						$table->string("titleDown");                // title in the footer
						$table->string("studio")->nullable();       // title of the studio
						$table->text('about');										// about

						$table->string("roomsDesc");                // room anchor description
						$table->string("glassDesc");								// glass... anchor description
						$table->string("restDesc");									// experiences anchor description
						$table->string("roomsImg");
						$table->string("glassImg");
						$table->string("restImg");

						$table->string("tel1");											// 1st tel number
						$table->string("tel2");											// 2nd tel number
						$table->string("email");										// email
						$table->string("tgLink");										// link for telegram
						$table->string("fbLink");										// link for facebook
						$table->string("twLink");										// link for twitter
						$table->string("instaLink");								// link for instagram

						$table->text('address');										// link for address
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
				Schema::dropIfExists('MainPage');
		}
}
