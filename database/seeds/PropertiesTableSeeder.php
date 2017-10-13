<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dir = storage_path('app/public/data');
        $files = scandir($dir);
        foreach ($files as $file)
        {
            if ('json' == pathinfo($file)['extension'])
            {
                $data = file_get_contents($dir . '/' . $file);
                $archive = json_decode($data, true)['features'][0];

                if (!DB::table('properties')->where(['name' => $archive['attributes']['物业公司']])->exists() && !empty(trim($archive['attributes']['物业公司']))) {
                    DB::table('properties')->insert([
                        'name' => $archive['attributes']['物业公司'],
                        'creater' => 1,
                        'modifier' => 1,
                        'created_at' => date('Y-m-d H:i:s', time()),
                        'updated_at' => date('Y-m-d H:i:s', time())]);
                }
            }
        }
    }
}
