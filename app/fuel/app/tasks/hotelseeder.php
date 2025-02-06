<?php

namespace Fuel\Tasks;

class Hotelseeder
{
	const TOTAL_SEEDER = 20;
	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r hotelseeder
	 *
	 * @return string
	 */
	public function run($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning DEFAULT task [Hotelseeder:Run]";
		echo "\n-------------------------------------------\n\n";

		/***************************
		 Put in TASK DETAILS HERE
		 **************************/
		for ($i = 0; $i < self::TOTAL_SEEDER; $i++) {
			\DB::insert('hotels')->set([
				'hotel_name' => 'John Doe',
				'address' => '123 Main Street',
				'phone' => '0123453215',
				'email' => 'john@example.com',
				'description' => 'John Doe is',
			])->execute();
	
			echo "Seeding completed!\n";
		}
	}



	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r hotelseeder:index "arguments"
	 *
	 * @return string
	 */
	public function index($args = NULL)
	{
		echo "\n===========================================";
		echo "\nRunning task [Hotelseeder:Index]";
		echo "\n-------------------------------------------\n\n";

		/***************************
		 Put in TASK DETAILS HERE
		 **************************/
	}

}
/* End of file tasks/hotelseeder.php */
