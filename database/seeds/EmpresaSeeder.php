<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    public function run()
    {
        DB::table('empresas')->insert(['nombre' => 'Lems']);   
        DB::table('empresas')->insert(['nombre' => 'Gtres']);   
    }
}
