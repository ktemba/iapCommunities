<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "id" => "1",
                "category_name" => "Administration",
                "about" => "Posts from the Strathmore University Administration",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => "2",
                "category_name" => "Student Council",
                "about" => "Student Council",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => "3",
                "category_name" => "Strathmore Communications",
                "about" => "Strathmore Communications",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => "5",
                "category_name" => "Career and Internship Opportunities",
                "about" => "Career and Internship Opportunities",
                "created_at" => date("Y-m-d H:i:s")
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
