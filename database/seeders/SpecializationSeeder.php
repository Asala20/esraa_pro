<?php

namespace Database\Seeders;
use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialization::create([
            'section' => 'AI',
        
            
            ]);
     Specialization::create([
                'section' => 'software',
            
                
                ]);
      Specialization::create([
                'section' => 'networking',
                
                    
                    ]);
    }
    }

