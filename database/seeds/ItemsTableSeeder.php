<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
  public function run()
  {
    //created an instance of Faker class to the variable $faker
    $faker = Faker::create();

    //getting all existing User ids into a $users array
    $users = User::all()->pluck('id')->toArray();

    //generate 10 records for the accounts table
    foreach (range(1,10) as $index) {
      DB::table('items')->insert([
        'category'=>$faker->randomElement($array=array ('pet','phone','jewellery')),
        'found time'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        //'found user'=>$faker->randomElement($users),
        'found place'=>$faker->streetAddress(),
        'colour'=>$faker->safeColorName()]);
} }
}
