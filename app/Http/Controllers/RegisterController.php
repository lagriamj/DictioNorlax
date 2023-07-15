<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function getData(Request $request)
    {
        $username = $request->input('username');
        $first_name = $request->input('fName');
        $last_name = $request->input('lName');
        $email = $request->input('email');

        return view('project', ['username' => $username, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email]);
    }
}
