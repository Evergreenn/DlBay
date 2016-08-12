<?php
/**
 * Created by PhpStorm.
 * User: Evergreen
 * Date: 8/3/16
 * Time: 13:01
 */

namespace DlBay\Http\Controllers;

use DlBay\File;
use Storage;
use Illuminate\Http\Request;
use DlBay\Jobs\UploadFile;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addFile()
    {
        return view('file/file');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeFile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
            'file' => [
                'required',
                'mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/x-msvideo,image/jpeg,image/png',
            ]
        ]);

        if ($request->file('file')->isValid()) {

            $ResourceFile = $request->file('file');

            $file = new File();

            $allInput = $request->all();
            $file->name = $allInput['name'];
            $file->description = $allInput['description'];
            $file->file = $ResourceFile->getClientOriginalName();

            $exists = Storage::disk('local')->exists($file->file);
            if(!$exists):

                $arg= [
                    'name' => $ResourceFile->getClientOriginalName(),
                    'path' => $ResourceFile->getRealPath()
                ];

                $job = (new UploadFile($arg))->onQueue('uploads');
                $this->dispatch($job);
                $file->save();

                return redirect('/');
            endif;

        }

    }
}
