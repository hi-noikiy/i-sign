<?php

use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Bus::class, 10)->create();

        $this->command->info('BusesTableSeeder execute success!');
    }
}
