<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paractisecontroler extends Controller
{
    public  function index()
    {
        return  view('paractise');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
        ]);

        return "Validation Done";
    }
}
