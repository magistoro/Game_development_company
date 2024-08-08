<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\GoogleStoreRequest as StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    } 

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            // dd($user);
            // Проверка, вошел ли пользователь в аккаунт Laravel Auth
            if (Auth::check()) {
                // Проверка наличия google_id в БД
                if (Auth::user()->google_id) {
                    throw new \Exception('Google account is already linked.');
                }

                // Сохраняем google_id в профиль пользователя

                $_user =  Auth::user();
                $_user->setAttribute('google_id', $user->id);
                $_user->setAttribute('avatar', $user->avatar);
                $_user -> save();

                return redirect()->route('profile');
            }

            // Проверка наличия google_id у пользователей в БД
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                // Вход в аккаунт Laravel Auth
                Auth::login($finduser);

                return redirect()->route('profile');
            } else {
                
                return view('auth.registerWithGoogle', ['user' => $user]);
            }
        } catch (\Throwable $th) {
            return Redirect::route('login')->with('error', 'Ошибка аутентификации. Пожалуйста, попробуйте еще раз.');
        }
    }


    public function registrationWithGoogle(StoreRequest $request){

        $data = $request->validated();

        // dd($data);
        $user = new User($data);
        $user->save();

        Auth::login($user); // Вход в систему нового пользователя

        // После успешной регистрации перенаправляем пользователя куда-нибудь
        return redirect()->route('profile')->with('success', 'Регистрация прошла успешно!');
    } 
}
