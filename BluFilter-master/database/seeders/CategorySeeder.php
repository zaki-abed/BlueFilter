<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => '1',
                'name' => 'Plumber',
                'name_ar' => 'سبّاك',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:52:47',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);

        DB::table('categories')->insert([
            [
                'id' => '2',
                'name' => 'Electrician',
                'name_ar' => 'كهربائي',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);


        DB::table('categories')->insert([
            [
                'id' => '3',
                'name' => 'Agriculture companies',
                'name_ar' => 'شركات الزراعة',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:52:47',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);

        DB::table('categories')->insert([
            [
                'id' => '4',
                'name' => 'Agricultural supplies providers',
                'name_ar' => 'مزودي المستلزمات الزراعية',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);
        DB::table('categories')->insert([
            [
                'id' => '5',
                'name' => 'Water suppliers',
                'name_ar' => 'مزودي المستلزمات المائية',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);
        DB::table('categories')->insert([
            [
                'id' => '6',
                'name' => 'Water consulting',
                'name_ar' => 'استشارات مائية',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);

        DB::table('categories')->insert([
            [
                'id' => '7',
                'name' => 'Agricultural consulting',
                'name_ar' => 'استشارات زراعية',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);

        DB::table('categories')->insert([
            [
                'id' => '8',
                'name' => 'Home water check',
                'name_ar' => 'فحص منزلي للمياه',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);
        DB::table('categories')->insert([
            [
                'id' => '9',
                'name' => 'Water supply stations',
                'name_ar' => 'محطات توريد المياه',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);

        DB::table('categories')->insert([
            [
                'id' => '10',
                'name' => 'Desalinated water distributors',
                'name_ar' => 'موزعي المياه المحلاة',
                'color' => '#ff0000',
                'created_at' => '2021-05-18 05:53:18',
                'updated_at' => '2021-05-18 05:52:47'

            ],
        ]);




        DB::table('category_user')->insert([
            [
                'category_id' => '1',
                'user_id' => '20',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '1',
                'user_id' => '151',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '1',
                'user_id' => '150',

            ],
        ]);
        //2
        DB::table('category_user')->insert([
            [
                'category_id' => '2',
                'user_id' => '20',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '2',
                'user_id' => '32',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '2',
                'user_id' => '134',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '2',
                'user_id' => '142',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '2',
                'user_id' => '144',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '2',
                'user_id' => '147',

            ],
        ]);
        //3
        DB::table('category_user')->insert([
            [
                'category_id' => '3',
                'user_id' => '32',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '3',
                'user_id' => '33',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '3',
                'user_id' => '134',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '3',
                'user_id' => '142',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '3',
                'user_id' => '144',

            ],
        ]);
        //4
        DB::table('category_user')->insert([
            [
                'category_id' => '4',
                'user_id' => '140',

            ],
        ]);
        //5
        DB::table('category_user')->insert([
            [
                'category_id' => '5',
                'user_id' => '51',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '5',
                'user_id' => '112',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '5',
                'user_id' => '140',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '5',
                'user_id' => '142',

            ],
        ]);
        //6
        DB::table('category_user')->insert([
            [
                'category_id' => '6',
                'user_id' => '33',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '6',
                'user_id' => '140',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '6',
                'user_id' => '142',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '6',
                'user_id' => '147',

            ],
        ]);
        //7
        DB::table('category_user')->insert([
            [
                'category_id' => '7',
                'user_id' => '33',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '7',
                'user_id' => '65',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '7',
                'user_id' => '112',

            ],
        ]);
        //8
        DB::table('category_user')->insert([
            [
                'category_id' => '8',
                'user_id' => '32',

            ],
        ]);
        //9

        DB::table('category_user')->insert([
            [
                'category_id' => '9',
                'user_id' => '31',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '9',
                'user_id' => '32',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '9',
                'user_id' => '65',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '9',
                'user_id' => '112',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '9',
                'user_id' => '131',

            ],
        ]);
        DB::table('category_user')->insert([
            [
                'category_id' => '9',
                'user_id' => '150',

            ],
        ]);
    }
}
