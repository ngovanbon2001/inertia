<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function show()
    {
        return Inertia::render('Show', [
            'user' => User::find(2)
        ]);
    }

    public function store(Request $request)
    {
        $form = $request->all();
        $form['password'] = Hash::make($form['password']);
        User::create($form);
    }
}
