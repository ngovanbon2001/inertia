<?php

namespace App\Http\Controllers;

use App\Exceptions\TestException;
use App\Http\Requests\User\CreateRequest;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Exception;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        try {
            $form = $request->all();
            $form['password'] = Hash::make($form['password']);
            $user = User::create($form);
            $user->notify(new OrderCreatedNotification());
            DB::commit();
            return redirect('/');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
