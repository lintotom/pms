<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Project::insert([
            [ 'id' =>'1','name' =>'Project 1','status' =>'Active'],
            [ 'id' =>'2','name' =>'Project 2','status' =>'Inactive'],
            [ 'id' =>'3','name' =>'Project 3','status' =>'Active'],
            [ 'id' =>'4','name' =>'Project 4','status' =>'Active'],
            [ 'id' =>'5','name' =>'Project 5','status' =>'Active'],
]);
        \App\Models\Task::insert([
            [ 'project_id' =>'1','name' =>'Task 1','status' =>'Active'],
            [ 'project_id' =>'1','name' =>'Task 2','status' =>'Active'],
            [ 'project_id' =>'1','name' =>'Task 3','status' =>'Active'],
            [ 'project_id' =>'4','name' =>'Task 4','status' =>'Active'],
            [ 'project_id' =>'4','name' =>'Task 5','status' =>'Active'],
        ]);
    }
}
