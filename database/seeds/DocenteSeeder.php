<?php

use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Docente::class, 50)->create()->each(function ($docente) {
            $docente->save();
        }); 
    }
}
