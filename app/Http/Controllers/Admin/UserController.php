<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::all();

        return view('admin.user.create', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $user = new User($data);

        return redirect()->route('admin.user.index')->with('success', 'Пользователь успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {      
               // Получение объекта Carbon из поля created_at
        $registrationDateTime = Carbon::parse($user->created_at);

       // Вычисление разницы между текущим временем и датой регистрации в минутах, часах, месяцах и годах
        $minutesAgo = $registrationDateTime->diffInMinutes();
        $hoursAgo = $registrationDateTime->diffInHours();
        $daysAgo = $registrationDateTime->diffInDays();
        $monthsAgo = $registrationDateTime->diffInMonths();
        $yearsAgo = $registrationDateTime->diffInYears();
            
        // Проверка диапазонов времени и формирование соответствующей строки
        if ($minutesAgo < 60) {
            $timeAgo = $minutesAgo . ' minutes ago';
        } elseif ($hoursAgo < 24) {
            $timeAgo = $hoursAgo . ' hours ago';
        } elseif ($daysAgo < 30) {
            $timeAgo = $daysAgo . ' days ago';
        } elseif ($monthsAgo < 12) {
            $timeAgo = $monthsAgo . ' months ago';
        } else {
            $timeAgo = $yearsAgo . ' years ago';
        }
        // Добавление значения time_ago к массиву $user
        $user['time_ago'] = $timeAgo;

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users = User::all();
        return view('admin.user.edit', compact('user', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success',  'Пользователь '.$user['name'].' успешно удалён!');
    }
}
