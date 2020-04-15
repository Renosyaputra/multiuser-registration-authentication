<?php

use Illuminate\Database\Seeder;

class superuser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $superuser = new \App\Superuser([
        'name' => 'reno',
        'email' => 'super1@superuser.com',
        'job_title' => 'departemen Komunikasi & digital',
        'password' => Hash::make('12345678')
      ]);
      $superuser-> save();
    }
}
