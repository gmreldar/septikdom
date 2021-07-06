<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $data = [
		    [
			    'name' => 'admin',
			    'email' => 'admin@mail.com',
			    'password' => '$2y$10$yeUfEohxwRVayHuc6GDA/eANZaf7ZG8snAqcfIgFq2vESfcUSfGSC',
		    ],
	    ];

	    DB::table('users')->insert($data);
    }
}
