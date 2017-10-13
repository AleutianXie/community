<?php

namespace App\Http\Controllers;

use App\Archive;
use App\Attach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $attachs = Attach::orderByDesc('id')->paginate(10);

        return view('attach.list', compact('archive', 'attachs'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $data = $request->input();
            $uploads_dir = storage_path('app/attach/' . date("Ym", time()));
            $saveFileNames = [];
            foreach ($_FILES["file-attach"]["error"] as $key => $error)
            {
                if ($error == UPLOAD_ERR_OK)
                {
                    $path_parts = pathinfo($_FILES["file-attach"]["name"][$key]);
                    if (!file_exists($uploads_dir))
                    {
                        mkdir($uploads_dir, 0777, true);
                    }
                    $ori_name = $path_parts['filename']. '.' . $path_parts['extension'];
                    $tmp_name = $_FILES["file-attach"]["tmp_name"][$key];
                    $name = md5_file($_FILES["file-attach"]["tmp_name"][$key]) . '.' . $path_parts['extension'];
                    if (move_uploaded_file($tmp_name, "$uploads_dir/$name"))
                    {
                        $saveFileNames[] = compact('ori_name', 'name');
                        if (!empty($data['id']))
                        {
                            $attach = new Attach();
                            $attach->aid = $data['id'];
                            $attach->name = $ori_name;
                            $attach->path = date("Ym", time()) . '/' . $name;
                            $attach->creater = Auth::id();
                            $attach->modifier = Auth::id();
                            if (!$attach->save())
                            {
                                return json_encode(['code' => 500, 'msg' => '上传失败!']);
                            }
                        }
                    }
                }
            }
            return json_encode(['code' => 500, 'msg' => '上传失败!']);
        }
    }

    public function delete(Request $request)
    {
        if ($request->isMethod('POST')) 
        {
            $data = $request->input();
            $attach = Attach::find($data['id']);
            $count = Attach::where(['path' => $attach->path])->count();
            if ($count == 1) {
                Storage::delete('attach/'.$attach->path);
            }
            if ($attach->delete()) {
                return redirect()->back()->with('succeed', __('admin.photo.delete_succeed'));
            }
            return redirect()->back()->with('error', __('admin.photo.delete_failed'));
        }
    }

    public function download(Request $request, $id)
    {
        $attach = Attach::find($id);

        return response()->download(storage_path('app/attach/'.$attach->path), $attach->name);
    }
}
