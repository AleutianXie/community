<?php

namespace App\Http\Controllers;

class ArchiveController extends Controller
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
     * Show the archives list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('archive.index');
    }

    /**
     * Add a archive.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archive.create');
    }

    /**
     * Add a archive.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail()
    {
        return view('archive.detail');
    }
}
