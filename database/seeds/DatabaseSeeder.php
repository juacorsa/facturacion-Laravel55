<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
      	$this->call(EmpresaSeeder::class);
      	$this->call(ServicioSeeder::class);      	
    }
}
