<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(User $user)
    {

        $this->model = $user;

    }

    public function index()
    {

        $users = User::all();

           return view('users.index', compact('users'));

    }

    public function show($id)
    {

        // $user = user::find($id);
        // $user = User::findOrFail($id);
        // $user = User::where('id', $id)->first();

        if(!$user = User::find($id)){
            return redirect()->route('users.index');
        }

        return view('users.show', compact('user'));

    }

    public function create()
    {

        return view("users.create");

    }

    public function store(Request $request)
    {

        // $user = new User;
        // $user->name     = $request->name;
        // $user->email    = $request->email;
        // $user->password = password_hash($request->password, PASSWORD_ARGON2I);
        // $user->save();

        $data = $request->all();
        $data['password'] = password_hash($request->password, PASSWORD_ARGON2I);
        $this->model->create($data);

        return redirect()->route("users.index");

    }

    public function edit($id)
    {

        if(!$user = $this->model->find($id)){

            return redirect()->view("users.index");

        }

        return view("users.edit", compact("user"));

    }

    public function update(Request $request, $id)
    {
        if(!$user = $this->model->find($id)){

            return redirect()->route("users.index");

        }

        $data = $request->only('name', 'email');

        if($request->password){

            $data['password'] = password_hash($request->password, PASSWORD_ARGON2I);

        }

        $user->update($data);

        return view("users.show", compact("user"));

        // 123456-> $argon2i$v=19$m=65536,t=4,p=1$M1J2RGFtQzA3Sk1lWExHcQ$BI7WoFZsZF0Z4eTEAtOBgi5wtKnADHBaxQkWLJkcWwE
        // 123456-> $argon2i$v=19$m=65536,t=4,p=1$cDVaLzFad01qU2dtL3k0Tw$4gsaMQmcQ0G0eBq89KHEYjptrtbmKLwm14VW8PBlQFs
    }

}