<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendedores')->insert([
            'nome' => "Felipe"
        ]);

        DB::table('vendedores')->insert([
            'nome' => "Glaucio"
        ]);

        DB::table('vendedores')->insert([
            'nome' => "Rodrigo"
        ]);

        DB::table('vendedores')->insert([
            'nome' => "Fabio"
        ]);

        DB::table('vendedores')->insert([
            'nome' => "João"
        ]);
    }
}
