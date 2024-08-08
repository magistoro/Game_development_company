<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('API.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->description = $request->input('description');
         // Сохраняем изменения в базе данных
        $user->save();

        return redirect()->back()->with('message', 'Описание успешно сохранено');
    }
}
