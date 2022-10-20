<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class NhanvienSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhanviens')->insert([
            'ten' => 'Admin',
            'email' => 'admin@gmail.com',
            'ngaysinh' => '2022-01-01',
            'gioitinh' => 0,
            'hoatdong' => 0,
            'password' => Hash::make('password'),
        ]);
    }
}
