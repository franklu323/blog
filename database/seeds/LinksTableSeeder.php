<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'link_name' => 'baidu',
                'link_title' => 'search engine',
                'link_url' => 'http://www.baidu.com',
                'link_order' => 1,
            ],
            [
                'link_name' => 'google',
                'link_title' => 'search engine',
                'link_url' => 'http://www.google.co.nz',
                'link_order' => 2,
            ]
        ];

        DB::table('links')->insert($data);
    }
}
