<?php

namespace App\Http\Controllers;
use App\Archive;
use App\Photo;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Spatie\Permission\Models\Role;

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
            'shape_area' => __('archive.shape_area'),
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
        'shape_area' => 'integer',
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
        //$role = Role::create(['name' => 'admin']);
        //dd($role->save());
        //$user = Auth::user();
        //dd($user->assignRole('admin'));

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
            $archive->pid = $data['property'];
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
                if (!empty($data['savedpath-design']))
                {
                    $savedimages = json_decode($data['savedpath-design'])->savedimages;
                    if (!empty($savedimages)) {
                        foreach ($savedimages as $image) {
                            $photo = new Photo();
                            $photo->aid = $archive->id;
                            $photo->path = 'file/' . date("Ym", time()) . $image;
                            $photo->type = '设计';
                            $photo->creater = Auth::id();
                            $photo->modifier = Auth::id();
                            if (!$photo->save()) {
                                return redirect('/')->with('error', __('archive.create_error'));
                            }
                        }
                    }
                }

                if (!empty($data['savedpath-complete']))
                {
                    $savedimages = json_decode($data['savedpath-complete'])->savedimages;
                    if (!empty($savedimages)) {
                        foreach ($savedimages as $image) {
                            $photo = new Photo();
                            $photo->aid = $archive->id;
                            $photo->path = 'file/' . date("Ym", time()) . '/'.$image;
                            $photo->type = '竣工';
                            $photo->creater = Auth::id();
                            $photo->modifier = Auth::id();
                            if (!$photo->save()) {
                                return redirect('/')->with('error', __('archive.create_error'));
                            }
                        }
                    }
                }
            }
            return redirect()->back()->with('succeed', __('archive.create_succeed'));
        }
        $properties = Property::all();
        $properties = array_pluck($properties->toArray(), 'name', 'id');
        //dd(array_prepend($properties, '', ''));
        return view('archive.create', compact('properties'));
    }

    /**
     * Show a archive.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $id)
    {
        $archive = Archive::findOrFail($id);
        $properties = Property::all();
        $propertyList = [];
        foreach ($properties as $property) {
            if ($property->id == $archive->pid) {
                $propertyList[] = ['id' => $property->id, 'text' => $property->name, 'selected' => true];
            }
            else {
                $propertyList[] = ['id' => $property->id, 'text' => $property->name];
            }
        }
        $properties = array_pluck($properties->toArray(), 'name', 'id');
        //dd($properties);
//dd($archive->geometry->rings);
        return view('archive.detail', compact('archive', 'propertyList'));
    }

    public function edit(Request $request)
    {
        //var_dump($request->input());exit;

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

        $archiveList = [];
        foreach ($archives as $archive) {
            $archiveList[$archive->property->name][] = [ 'id' => $archive->id, 'name' => $archive->name ];
        }
        return view('archive.map', compact('archives', 'id', 'archiveList'));
    }

    public function uploadimage(Request $request, $type)
    {
        $data = $request->input();
        $uploads_dir = storage_path('app/aetherupload/file/' . date("Ym", time()));
        $saveFileNames = [];
        //dd($_FILES);
        foreach ($_FILES["file-".$type]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $path_parts = pathinfo($_FILES["file-".$type]["name"][$key]);
                $tmp_name = $_FILES["file-".$type]["tmp_name"][$key];
                $name = md5_file($_FILES["file-".$type]["tmp_name"][$key]).'.'.$path_parts['extension'];
                if (move_uploaded_file($tmp_name, "$uploads_dir/$name")) {
                    $saveFileNames[] = $name;
                    if (!empty($data['id'])) {
                            $photo = new Photo();
                            $photo->aid = $data['id'];
                            $photo->path = 'file/' . date("Ym", time()) . '/'.$name;
                            $photo->type = $type == 'design' ? '设计' : '竣工';
                            $photo->creater = Auth::id();
                            $photo->modifier = Auth::id();
                            $photo->save();
                    }
                }
            }
        }
        return json_encode(['savedimages' => $saveFileNames]);
    }
}
