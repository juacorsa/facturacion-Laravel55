<?php

use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{    
    public function run()
    {
        DB::table('servicios')->insert(['nombre' => 'Mantenimiento informático']);        
        DB::table('servicios')->insert(['nombre' => 'Dominio']);        
        DB::table('servicios')->insert(['nombre' => 'Hosting']);        
        DB::table('servicios')->insert(['nombre' => 'Certificado SSL']);        
        DB::table('servicios')->insert(['nombre' => 'Banner']);                
    }
}
