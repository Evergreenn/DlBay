<?php
/**
 * Created by PhpStorm.
 * User: Evergreen
 * Date: 8/3/16
 * Time: 13:01
 */

namespace App\Http\Controllers;

use Storage;

class FileController extends Controller
{

    public function showFile()
    {
        $files = Storage::disk('local')->Files();
        var_dump($files);
    }
}
