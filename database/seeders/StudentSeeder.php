<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
    	// Student::truncate();
    	// Schema::enableForeignKeyConstraints();

    	// $data = [
    	// 	['name' => 'Aiu', 'gender' => 'P', 'nis' => '202201', 'class_id' => 2],
    	// 	['name' => 'Budi', 'gender' => 'L', 'nis' => '202202', 'class_id' => 2],
    	// 	['name' => 'Siti', 'gender' => 'P', 'nis' => '202203', 'class_id' => 1],
    	// 	['name' => 'Tono', 'gender' => 'L', 'nis' => '202204', 'class_id' => 3],
    	// ];

    	// foreach ($data as $value) {
    	// 	Student::insert([
    	// 		'name' => $value['name'],
    	// 		'gender' => $value['gender'],
    	// 		'nis' => $value['nis'],
    	// 		'class_id'=> $value['class_id'],
    	// 		'created_at' => Carbon::now(),
	    //     	'updated_at' => Carbon::now() 
    	// 	]);
    	// }
		
		Student::factory()->count(20)->create();
    }
}
