<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\archive;

class AttachController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->attributes = [
        //     'name' => __('auth.name'),
        //     'email' => __('auth.email'),
        //     'password' => __('auth.password'),
        //     'confrim' => __('auth.confrim'),
        //     'pid' => __('archive.property'),
        // ];
    }

    public function list(Request $request, $id)
    {
        $archive = Archive::find($id);

        return view('attach.list', compact('archive'));
    }
}
