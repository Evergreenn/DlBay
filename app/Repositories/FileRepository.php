<?php
/**
 * Created by PhpStorm.
 * User: Evergreen
 * Date: 8/3/16
 * Time: 22:44
 */


namespace DlBay\Repositories;

use DlBay\File;

class FileRepository
{

    /**
     * @return mixed
     */
    public static function getFile()
    {
        return File::orderBy('created_at', 'asc')
            ->get();
    }
}
