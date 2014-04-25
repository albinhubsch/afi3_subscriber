<?php

class ApiUserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// 
		$api_user = new ApiUser();
		$api_user->api_key = '72f091a19b5869119a152923425b642c3b84db5a';
		$api_user->password = '1234';
		$api_user->save();
	}

}
