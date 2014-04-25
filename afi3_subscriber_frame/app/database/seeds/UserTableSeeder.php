<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// 
		$user = new User();

		$user->email = 'albin.hubsch@gmail.com';
		$user->subscription_number = '1001';
		$user->password = '1234';
		$user->personal_number = '199203083499';
		$user->firstname = 'Albin';
		$user->lastname = 'Hubsch';
		$user->adress = 'Mariehemsvägen 25A';
		$user->zip_code = '90653';
		$user->city = 'Umeå';
		$user->country = 'Sweden';

		$user->save();
		
	}

}
