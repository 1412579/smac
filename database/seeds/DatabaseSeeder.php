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
				'password' => Hash::make('1345314'),
				'KichHoat' => 1,
				'SoLuotTG' => 100,
				'Quyen' => 1,
				"created_at" =>  \Carbon\Carbon::now(),
            	"updated_at" => \Carbon\Carbon::now())
			]);

		DB::table('bo_des')->insert([
			array(
				'TenBo' => 'SMAC-2020', 
				'NoiDung' => 'Đề thi SMAC 2020', 
				"created_at" =>  \Carbon\Carbon::now(),
            	"updated_at" => \Carbon\Carbon::now())
			]);

		for ($i=1; $i <= 300; $i++) { 
			$pass = generateRandomPassword(6);
			$fp = @fopen('DataUser-ChoMayEm-SMAC.txt', "a+");
			fwrite($fp, 'SMAC-'.$i.','.$pass."/n");
			DB::table('teams')->insert([
			array(
				'TenNhom' => 'SMAC-'.$i, 
				'TenDangNhap' => 'SMAC-'.$i, 
				'password' => Hash::make($pass),
				'KichHoat' => 0,
				'SoLuotTG' => 100,
				'Quyen' => 0,
				"created_at" =>  \Carbon\Carbon::now(),
            	"updated_at" => \Carbon\Carbon::now())
			]);
		}
	}
}

