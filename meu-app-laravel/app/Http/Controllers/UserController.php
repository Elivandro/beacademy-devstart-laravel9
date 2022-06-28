<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            "names"  => [
                "Maria", 
                "José", 
                "João",
                "Pedro",
                "Julia"
            ]
        ];

        dd($users);

    }

    public function show($id)
    {

        $users = [
            "names"  => [
                "Maria", 
                "José", 
                "João",
                "Pedro",
                "Julia"
            ]
        ];

        return "O nome é {$users['names'][$id]} e o id -> {$id}";

    }
}
