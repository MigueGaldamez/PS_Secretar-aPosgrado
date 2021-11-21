<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        \App\Models\Universidad::factory(5)->create();
        $path = 'database/seeders/datos.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Cuentas creadas!');

    }
}
