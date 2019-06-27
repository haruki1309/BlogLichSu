<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    		[
                'username'=>'tin',
    			'password'=>bcrypt('tinn'),
                'fullname'=>'Bùi Trung Tín',
    			'email'=>'buitrungtin@gmail.com',
                'level'=>'1'
    		],
            [
                'username'=>'lan',
                'password'=>bcrypt('lann'),
                'fullname'=>'Thái Thị Phương Lan',
                'email'=>'thaiphuonglan@gmail.com',
                'level'=>'1'
            ],
            [
                'username'=>'nguyen',
                'password'=>bcrypt('nguyen'),
                'fullname'=>'Nguyễn Trung Nguyên',
                'email'=>'nguyentrungnguyen@gmail.com',
                'level'=>'1'
            ],
            [
                'username'=>'tu',
                'password'=>bcrypt('tuuu'),
                'fullname'=>'Trần Thị Cẩm Tú',
                'email'=>'trancamtu@gmail.com',
                'level'=>'1'
            ]
    	];
        DB::table('users')->insert($data);
    }
}
