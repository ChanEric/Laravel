<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('ContactsTableSeeder');
		$this->call('UsersTableSeeder');
	}

}