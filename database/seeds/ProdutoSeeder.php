<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'titulo' => 'Computador',
            'preco'  => 1500.00
        ]);

        DB::table('produtos')->insert([
            'titulo' => 'Teclado Gamer',
            'preco'  => 100.50
        ]);

        DB::table('produtos')->insert([
            'titulo' => 'Mouse Gamer',
            'preco'  => 80.50
        ]);

        DB::table('produtos')->insert([
            'titulo' => 'Fone de Ouvido',
            'preco'  => 20
        ]);

        DB::table('produtos')->insert([
            'titulo' => 'Celular iPhone',
            'preco'  => 5000
        ]);

        DB::table('produtos')->insert([
            'titulo' => 'Pen Drive 16GB',
            'preco'  => 15
        ]);

        DB::table('produtos')->insert([
            'titulo' => 'Pen Drive 32GB',
            'preco'  => 32
        ]);

        DB::table('produtos')->insert([
            'titulo' => 'Pen Drive 120GB',
            'preco'  => 120
        ]);
    }
}
