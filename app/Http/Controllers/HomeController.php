<?php

namespace DlBay\Http\Controllers;

use DlBay\Http\Requests;
use Illuminate\Http\Request;
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
            $tmp = Storage::disk('local')->url($file);
            $aPathFile[$file] = ['url' => $tmp];
        endforeach;

        return view('home', ['files' => $aPathFile]);
    }
}
