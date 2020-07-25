<?php

use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Curso::class, 25)->create()->each(function ($curso) {
            $curso->save();
        }); 
    }
}
