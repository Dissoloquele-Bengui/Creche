<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //\App\Models\User::find(1)->forcedelete();
        $tableName = (new \App\Models\User())->getTable();

        // Obter os nomes das colunas da tabela
        $columns = Schema::getColumnListing($tableName);

        // Exibir os nomes das colunas
        //dd($columns);
        DB::table('users')->insert([
            'name' => 'Dissoloquele',
            'email' => 'mysge@gmail.com',
            'password' => Hash::make('12345678'),
            'tipo'=>"Administrador"
        ]);
    }
}
