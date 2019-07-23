<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = 'administrator';
        $administrator->name = 'Site Administrator';
        $administrator->email = 'administrator@larashop.test';
        $administrator->roles = json_encode(['ADMIN']);
        $administrator->password = \Hash::make("larashop");
        $administrator->avatar = 'Saat-ini-tidak-ada-file.png';
        $administrator->phone = '085934365232';
        $administrator->addres = 'Dari Mataram';

        $administrator->save();

        $this->command->info("User Addmin Berhasil Di input");

    }
}
