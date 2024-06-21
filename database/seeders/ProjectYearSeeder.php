<?php

namespace Database\Seeders;
use App\Models\project_year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project_Year::create([
        
            'project_year' => '2019',
            // 'project_year' => '2022-m-d',
           ]);
        Project_Year::create([
        
            'project_year' => '2020',
         
           ]); 
         Project_Year::create([
        
            'project_year' => '2021',
            
           ]);
           Project_Year::create([
        
            'project_year' => '2022',
       
           ]);
           Project_Year::create([
        
            'project_year' => '2023',
          
           ]);
    }
    }

