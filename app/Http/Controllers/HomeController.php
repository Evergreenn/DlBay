<?php

namespace DlBay\Http\Controllers;

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
        $files = Storage::disk('local')->Files();
        $aPathFile = [];

        foreach($files as $file):
            $url = Storage::disk('local')->url($file);
            $tmpDate = new \DateTime();
            $tmpDate->setTimestamp(Storage::disk('local')->lastModified($file));
            $lastUpdate = date_format($tmpDate, 'd/m/Y H:i:s');

            $aPathFile[$file] = ['url' => $url, 'lastUpdate' => $lastUpdate];
        endforeach;

        return view('home', ['files' => $aPathFile]);
    }
}
