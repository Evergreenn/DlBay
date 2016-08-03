<?php

/**
 * Created by PhpStorm.
 * User: Evergreen
 * Date: 8/3/16
 * Time: 22:07
 */
namespace DlBay\Helper;

use DlBay\File;
use Storage;

class MigrationHelper
{
    public static function MigrateExistingFiles()
    {

        $files = Storage::disk('local')->files();

        foreach($files as $file):
            $DbFile = new File();
            $DbFile->name = $file;
            $DbFile->file = $file;
            $DbFile->save();
        endforeach;

    }


}
