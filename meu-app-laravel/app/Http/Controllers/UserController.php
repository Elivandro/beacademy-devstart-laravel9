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

    public function delete($id)
    {

        dd($id);

    }

}