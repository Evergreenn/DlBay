<?php

namespace DlBay\Http\Controllers;

use DlBay\Repositories\FileRepository;
use DlBay\Http\Requests;
use Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = FileRepository::getFile();
        $aPathFile = [];

        foreach($files as $file):

            if(false !== Storage::disk('local')->exists($file->file)):

                $url = Storage::disk('local')->url($file->file);

                $tmpDate = new \DateTime();

                $tmpDate->setTimestamp(Storage::disk('local')->lastModified($file->file));
                $lastUpdate = date_format($tmpDate, 'd/m/Y H:i:s');

                $aPathFile[$file->name] = ['url' => $url, 'lastUpdate' => $lastUpdate];
            endif;
        endforeach;

        return view('home', ['files' => $aPathFile]);
    }
}
