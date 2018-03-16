<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #region Projects

        $projects = factory( \App\Models\Project::class , 5 )->create();

        #endregion


    }
}
