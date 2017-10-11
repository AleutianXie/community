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
        $dir = storage_path('app/xiaoqutuzhihuizong');
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
                $charset =  mb_detect_encoding($aName,"UTF-8, ISO-8859-1, GBK")
                echo mb_convert_encoding($aName, 'UTF-8', $charset) . "\n";
                $archive = Archive::where(['name' => mb_convert_encoding($aName, 'UTF-8', $charset)])->get()->toArray();
                $types = scandir($dir . '/' . $subDir);
                foreach ($types as $type)
                {
                    if (!in_array($type, ['.', '..']))
                    {
                        $aType = mb_substr($type, 2, 2, $charset);
                        echo $aType . "\n";

                        $files = scandir($dir . '/' . $subDir . '/' . $type);
                        foreach ($files as $file)
                        {
                            if (!in_array($file, ['.', '..']))
                            {
                                $filePath = $dir . '/' . $subDir . '/' . $type . '/' . $file;
                                $md5 = md5_file($dir . '/' . $subDir . '/' . $type . '/' . $file);
                                $extension = pathinfo($filePath)['extension'];
                                $filename = pathinfo($filePath)['filename'];
                                copy($filePath, $saveDir . '/' . $md5 . '.' . $extension);
                                if (isset($archive[0]['id']))
                                {
                                    $arr[] = [$aName, $aType, $file, $md5, $archive[0]['id'], 'file/' . date("Ym", time()) . '/' . $md5 . '.' . $extension];
                                    echo "insert " . mb_convert_encoding($file, 'UTF-8', $charset) . "\n";
                                    DB::table('photos')->insert([
                                        'aid' => $archive[0]['id'],
                                        'path' => 'file/' . date("Ym", time()) . '/' . $md5 . '.' . $extension,
                                        'name' => mb_convert_encoding($filename, 'UTF-8', $charset),
                                        'type' => mb_convert_encoding($aType, 'UTF-8', $charset),
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
        echo "OK!\n";
    }
}
