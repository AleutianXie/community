<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Property;
use App\UserProperty;
use Validator;

class AdminController extends Controller
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
            'name' => __('auth.name'),
            'email' => __('auth.email'),
            'password' => __('auth.password'),
            'confrim' => __('auth.confrim'),
            'pid' => __('archive.property'),
        ];
    }

    private $validationRules = [
        'name' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|alpha_dash',
        'confrim' => 'required|alpha_dash|same:password',
        'pid' => 'required|integer',
    ];
    private $attributes;

    /**
     * Show the user list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function createUser(Request $request)
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
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = password_hash($data['password'], PASSWORD_BCRYPT);

            if ($user->save())
            {
                $userProperty = new UserProperty();
                $userProperty->uid = $user->id;
                $userProperty->pid = $data['pid'];
                if ($userProperty->save()) {
                    $user->assignRole('property');
                    return redirect('/admin')->with('succeed', __('admin.create_succeed'));
                }
            }
            return redirect()->back()->with('succeed', __('admin.create_succeed'));
        }
        $properties = Property::all();
        $properties = array_pluck($properties->toArray(), 'name', 'id');

        return view('admin.user.create', compact('properties'));
    }

    public function resetpassword(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->isMethod('POST'))
        {
            $data = $request->input();
            $id = $data['id'];
            $user->password = password_hash($data['password'], PASSWORD_BCRYPT);

            $rules = array_where($this->validationRules, function ($value, $key) use ($data)
            {
                return $key == 'password';
            });

            Validator::validate(
                ['password' => $data['password']],
                $rules,
                [],
                $this->attributes
            );
            if (!$user->save())
            {
            return redirect()->back()->with('error', __('admin.update_failed'));
            }
            return redirect()->back()->with('succeed', __('admin.update_succeed'));
        }
        return view('admin.user.reset', compact('user'));
    }
}
