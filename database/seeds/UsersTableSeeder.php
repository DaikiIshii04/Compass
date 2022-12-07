<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'over_name' => '石井',
                'under_name' => '大貴',
                'over_name_kana' => 'イシイ',
                'under_name_kana' => 'ダイキ',
                'mail_address' => 'User@User01',
                'sex' => '1',
                'birth_day' => '1998-04-24',
                'role' => '1',
                'password' =>$password = Hash::make ("Daiki2400"),
        ]);
    }
}
