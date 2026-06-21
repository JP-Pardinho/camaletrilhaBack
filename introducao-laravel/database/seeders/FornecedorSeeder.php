<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'www.fornecedor1.com';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'fornecedor1@email.com';
        $fornecedor->save();

        Fornecedor::created([
            'nome' => 'Fornecedor 200',
            'site' => 'www.fornecedor200.com',
            'uf' => 'RJ',
            'email' => 'contato@fornecedor200.com'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'www.fornecedor300.com',
            'uf' => 'MG',
            'email' => 'fornecedor300@email.com'
        ]);
    }
}
