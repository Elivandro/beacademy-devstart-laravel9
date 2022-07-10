<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{
    public function __construct(User $user)
    {

        $this->model = $user;

    }

    public function index()
    {

        $users = User::paginate(5);


        
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
        // return view('users.show', compact('user'));

    }

    public function create()
    {

        return view("users.create");

    }

    public function store(StoreUpdateUserFormRequest $request)
    {

        // $user = new User;
        // $user->name     = $request->name;
        // $user->email    = $request->email;
        // $user->password = password_hash($request->password, PASSWORD_ARGON2I);
        // $user->save();

        $data = $request->all();
        $data['password']   = password_hash($request->password, PASSWORD_ARGON2I);

        if($request->image){
            $file               = $request['image'];
            $path               = $file->store('profile', 'public');
            $data['image']      = $path;
        }

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

    public function update(StoreUpdateUserFormRequest $request, $id)
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

    }

    public function destroy($id)
    {
        if(!$user = $this->model->find($id)){

            return redirect()->route("users.index");

        }

        $user->delete();

        return redirect()->route("users.index");

    }

}