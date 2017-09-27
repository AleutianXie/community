<?php

namespace App\Http\Controllers;
use App\Archive;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

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
        $this->attributes = [
            'name' => __('archive.name'),
            'address' => __('archive.address'),
            'unit' => __('archive.unit'),
            'building' => __('archive.building'),
            'lift' => __('archive.lift'),
            'property' => __('archive.property'),
            'principal' => __('archive.principal'),
            'mobile' => __('archive.mobile'),
        ];
    }

    /**
     * Define your validation rules in a property in
     * the controller to reuse the rules.
     */
    protected $validationRules = [
        'name' => 'required|unique:archives',
        'address' => 'required',
        'unit' => 'required|integer|min:1|max:9999',
        'building' => 'required|integer|min:1|max:999',
        'lift' => 'required|integer|min:1|max:999',
        'property' => 'required',
        'principal' => 'required',
        'mobile' => ['required', 'regex:/^1(3|4|5|7|8)[0-9]{9}$/'],
    ];

    private $attributes;
    /**
     * Show the archives list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives = Archive::orderByDesc('id')->paginate(10);
        return view('archive.index', compact('archives'));
    }

    /**
     * Add a archive.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $this->validate(
                $request,
                $this->validationRules,
                [],
                $this->attributes
            );
            $data = $request->input();

            $archive = new Archive();
            $archive->name = $data['name'];
            $archive->address = $data['address'];
            $archive->unit = $data['unit'];
            $archive->building = $data['building'];
            $archive->lift = $data['lift'];
            $archive->property = $data['property'];
            $archive->principal = $data['principal'];
            $archive->mobile = $data['mobile'];
            if (!empty($data['geometry']))
            {
                $archive->geometry = $data['geometry'];
            }
            $archive->creater = Auth::id();
            $archive->modifier = Auth::id();

            if ($archive->save())
            {
                if (!empty($data['savedpath']))
                {
                    $photo = new Photo();
                    $photo->aid = $archive->id;
                    $photo->path = $data['savedpath'];
                    $photo->creater = Auth::id();
                    $photo->modifier = Auth::id();

                    if ($photo->save())
                    {
                        return redirect('/')->with('success', __('archive.create_succeed'));
                    }
                }
                return redirect('/')->with('success', __('archive.create_succeed'));
            }
            return redirect()->back()->with('error', __('archive.create_error'));
        }
        return view('archive.create');
    }

    /**
     * Show a archive.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $id)
    {
        $archive = Archive::findOrFail($id);
//dd($archive->geometry->rings);
        return view('archive.detail', compact('archive'));
    }

    public function edit(Request $request)
    {

        if ($request->isMethod('POST'))
        {
            $data = $request->input();
            $id = $data['pk'];
            $archive = Archive::find($id);
            $archive->{$data['name']} = $data['value'];
            $archive->modifier = Auth::id();

            $rules = array_where($this->validationRules, function ($value, $key) use ($data)
            {
                return $key == $data['name'];
            });

            Validator::validate(
                [$data['name'] => $data['value']],
                $rules,
                [],
                $this->attributes
            );
            if (!$archive->save())
            {
                return '更新失败';
            }
        }
    }

    public function map(Request $request, $id = null)
    {
        $archives = Archive::all();
//        return view('archive.map', compact('archives', 'id'));
        $archiveList=[];
        foreach($archives as $archive){
          $archiveList[$archive->property->name][]=['id'=>$archive->id,'name'=>$archive->name];
        }
      return view('archive.map', compact('archives','id', 'archiveList'));
    }
}
