<?php

use Illuminate\Database\Seeder;

class TourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 9;
        DB::table('tour')->insert([
            'name' => "Tour Miền Trung: Đà Nẵng - Bà Nà - Hội An - Huế - Động Phong Nha",
            'image' => "public/img/tour-mien-trung.png",
            'typetour' => "Từ Hồ Chí Minh",
            'schedule' => "4 ngày 3 đêm",
            'depart' => "02/07/2020",
            'number' => 9,
            'price' => 4999999
        ]);
        for ($i = 0; $i < $limit; $i++) {
            DB::table('tour')->insert([
                'name' => "Tour ".$faker->city,
                'image' => "public/img/tour-mien-trung.png",
                'typetour' => "Từ ".$faker->city,
                'schedule' => "4 ngày 3 đêm",
                'depart' => date($format = 'd-m-y'),
                'number' => "9",
                'price' => $faker->unique()->randomNumber($nbDigits = 7)
            ]);
        }
    }
}
