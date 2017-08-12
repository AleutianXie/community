<?php

namespace App\Http\Controllers;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PropertyController extends Controller
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
		$this->attributes = [
			'name' => __('archive.property.name'),
		];
	}

	/**
	 * Define your validation rules in a property in
	 * the controller to reuse the rules.
	 */
	protected $validationRules = [
		'name' => 'required|unique:properties',
	];

	private $attributes;

	/**
	 * Show the properties list.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$properties = Property::orderByDesc('id')->paginate(10);
		return view('property.index', compact('properties'));
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

			$property = new Property();
			$property->name = $data['name'];
			$property->creater = Auth::id();
			$property->modifier = Auth::id();

			if ($property->save())
			{
				return redirect('/property')->with('success', __('archive.create_succeed'));
			}
			return redirect()->back()->with('error', __('archive.create_error'));
		}
		return view('property.create');
	}

	/**
	 * Show a archive.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function detail(Request $request, $id)
	{
		$property = Property::findOrFail($id);
//dd($archive->geometry->rings);
		return view('property.detail', compact('property'));
	}

	public function edit(Request $request)
	{

		if ($request->isMethod('POST'))
		{
			$data = $request->input();
			$id = $data['pk'];
			$property = Property::find($id);
			$property->{$data['name']} = $data['value'];
			$property->modifier = Auth::id();

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
			if (!$property->save())
			{
				return '更新失败';
			}
		}
	}
}
