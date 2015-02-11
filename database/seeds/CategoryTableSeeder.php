<?php namespace Todoparrot;    
  
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
class CategoryTableSeeder extends Seeder {
 
  public function run()
  {
    
    Category::create([
      'name' => 'Leisure'
    ]);
    
    Category::create([
      'name' => 'Work'
    ]);

     Category::create([
      'name' => 'Shopping'
    ]);

  }
 
}