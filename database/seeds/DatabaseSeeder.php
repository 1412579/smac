<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('teams')->insert([
			array(
				'TenNhom' => 'admin', 
				'TenDangNhap' => 'admin', 
				'password' => Hash::make('1'),
				'KichHoat' => 1,
				'SoLuotTG' => 100,
				'Quyen' => 1,
				"created_at" =>  \Carbon\Carbon::now(),
            	"updated_at" => \Carbon\Carbon::now())
			]);

		// for ($i=1; $i <= 300; $i++) { 
		// 	$pass = generateRandomPassword(15);
		// 	$fp = @fopen('fileMK.txt', "a+");
		// 	fwrite($fp, 'smac-'.$i.' - '.$pass."/n");
		// 	DB::table('teams')->insert([
		// 	array(
		// 		'TenNhom' => 'smac-'.$i, 
		// 		'TenDangNhap' => 'smac-'.$i, 
		// 		'password' => Hash::make($pass),
		// 		'KichHoat' => 0,
		// 		'SoLuotTG' => 100,
		// 		'Quyen' => 0,
		// 		"created_at" =>  \Carbon\Carbon::now(),
  //           	"updated_at" => \Carbon\Carbon::now())
		// 	]);
		// }
	}
}
