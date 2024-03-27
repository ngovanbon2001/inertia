<?php

namespace App\Http\Controllers;

use App\Exceptions\TestException;
use App\Http\Requests\User\CreateRequest;
use App\Models\User;
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

    public function store(CreateRequest $request)
    {
        $form = $request->all();
        $form['password'] = Hash::make($form['password']);
        User::create($form);
    }
}
