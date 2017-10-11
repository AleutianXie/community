<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PhotoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->attributes = [
            'name' => __('archive.photo.name'),
        ];
    }

    private $validationRules = [
        'name' => 'required',
    ];
    private $attributes;

    public function changename(Request $request)
    {
        //var_dump($request->input());exit;

        if ($request->isMethod('POST'))
        {
            $data = $request->input();
            $id = $data['pk'];
            $photo = Photo::find($id);
            $photo->name = $data['value'];
            $photo->modifier = Auth::id();

            $rules = array_where($this->validationRules, function ($value, $key) use ($data)
            {
                return $key == 'name';
            });

            Validator::validate(
                ['name' => $data['value']],
                $rules,
                [],
                $this->attributes
            );
            if (!$photo->save())
            {
                return '更新失败';
            }
        }
    }
}
