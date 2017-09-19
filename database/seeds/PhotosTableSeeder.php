<?php

use App\Archive;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    $dir = storage_path('app/xiaoqutuzhi');
    $saveDir = storage_path('app/aetherupload/file/' . date("Ym", time()));
    if (!file_exists($saveDir))
    {
      mkdir($saveDir, 0777, true);
    }

    $subDirs = scandir($dir);
    $arr = [];
    foreach ($subDirs as $subDir)
    {
      if (!in_array($subDir, ['.', '..']))
      {
        $aName = $subDir;
        $archive = Archive::where(['name' => mb_convert_encoding($aName,'UTF-8','GBK')])->get()->toArray();
        //var_dump($aName);
        //var_dump($archive[0]['id']);exit;
        $types = scandir($dir . '/' . $subDir);
        foreach ($types as $type)
        {
          if (!in_array($type, ['.', '..']))
          {
            $aType = substr($type, 2, 4);

            $files = scandir($dir . '/' . $subDir . '/' . $type);
            foreach ($files as $file)
            {
              if (!in_array($file, ['.', '..']))
              {
                $filePath = $dir . '/' . $subDir . '/' . $type . '/' . $file;
                //var_dump($filePath);
                $md5 = md5_file($dir . '/' . $subDir . '/' . $type . '/' . $file);
                $extension = pathinfo($filePath)['extension'];
                copy($filePath, $saveDir . '/' . $md5 . '.' . $extension);
                //var_dump($archive);
                if (isset($archive[0]['id']))
                {
                  //var_dump($aType);exit;
                  $arr[] = [$aName, $aType, $file, $md5, $archive[0]['id'], 'file/' . date("Ym", time()) . '/' . $md5 . '.' . $extension];
                  DB::table('photos')->insert([
                    'aid' => $archive[0]['id'],
                    'path' => 'file/' . date("Ym", time()) . '/' . $md5 . '.' . $extension,
                    'type' => mb_convert_encoding($aType,'UTF-8','GBK'),
                    'creater' => 1,
                    'modifier' => 1,
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time())]);
                }
              }
            }
          }
        }
      }
    }
    var_dump($arr);
  }
}
