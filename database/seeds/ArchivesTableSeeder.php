<?php

use Illuminate\Database\Seeder;

class ArchivesTableSeeder extends Seeder
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

          if (!empty(trim($archive['attributes']['物业公司']))) {
            $property = DB::table('properties')->where(['name' => $archive['attributes']['物业公司']])->get(['id']);
            DB::table('archives')->insert([
              'name' => $archive['attributes']['小区名称'],
              'address' => $archive['attributes']['地址'],
              'unit' => $archive['attributes']['单元数'],
              'building' => $archive['attributes']['幢数'],
              'lift' => $archive['attributes']['电梯数'],
              'pid' => $property[0]->id,
              'principal' => $archive['attributes']['负责人'],
              'mobile' => $archive['attributes']['联系电话'],
              'geometry' => json_encode($archive['geometry']),
              'creater' => 1,
              'modifier' => 1,
              'created_at' => date('Y-m-d H:i:s', time()),
              'updated_at' => date('Y-m-d H:i:s', time())]);
          }
        }
      }
    }

}
