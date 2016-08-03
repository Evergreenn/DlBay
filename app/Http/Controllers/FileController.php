<?php
/**
 * Created by PhpStorm.
 * User: Evergreen
 * Date: 8/3/16
 * Time: 13:01
 */

//TODO: remove .idea

namespace DlBay\Http\Controllers;

use DlBay\File;
use Storage;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addFile()
    {
        return view('file/file');
    }

    public function storeFile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'file' => 'required',
        ]);

        if ($request->file('file')->isValid()) {

            $extension = $request->file('file')->getClientOriginalExtension();
            $ResourceFile = $request->file('file');

            $file = new File();

            $allInput = $request->all();
            $file->name = $allInput['name'];
            $file->description = $allInput['description'];
            $file->file = $request->file('file')->getClientOriginalName();

            $exists = Storage::disk('local')->exists("$file->name.$extension");
            if(!$exists):

                Storage::put(
                    "$file->name.$extension",
                    file_get_contents($ResourceFile->getRealPath())
                );
                $file->save();

                return redirect('/');
            endif;

        }

    }
}
