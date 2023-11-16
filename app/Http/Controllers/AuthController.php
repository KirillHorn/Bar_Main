<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{ 
   public function auth() { //Открытие авторизации
    return view('auth.autho');
   }
   public function auth_valid(Request $request) //Авторизация
   {
     $request->validate([
        "email" => "required|email",
        "password" => "required",
    ], [
        "email.required" => "Поле обязательно для заполнения!",
        "email.email" => "Введите корректный email",
        "password.required" => "Поле обязательно для заполнения!",
    ]);

    $user = $request->only("email" , "password");
    if (Auth::attempt( [
     "email" => $user['email'],
     "password" => $user['password']
    ])) {
    if(Auth::user()->id_role == 2) { // проверка на роль пользователя
     return redirect('/admin/serviceEdit');
 } else {
     return redirect('/');
 }

    }
    return redirect()->back()->with("error","Неверный логин или пароль");
  }
   public function regist() { //Открытие страница регистрации
      return view('auth.register');
   }
   public function reg_valid(Request $request) { // сама регистрация
      $request->validate([
         "email"=> "required|unique:users|email",
         "name"=> "required",
         "surname"=> "required",
         "patronymic"=> "required",
         "phone"=> "required",
         "password"=> "required",
         "confirm_password"=>"required|same:password"]
         ,[ 
             "email.required" => "Поле обязательно для заполнения!",
         "email.email" => "Введите корректный email",
         "email.unicue" => "Данный email уже занят",
         "name.required" => "Поле обязательно для заполнения!",
         "surname.required" => "Поле обязательно для заполнения!",
         "patronymic.required" => "Поле обязательно для заполнения!",
         "phone.required" => "Поле обязательно для заполнения!",
         "password.required" => "Поле обязательно для заполнения!",
         "confirm_password.required" => "Поле обязательно для заполнения!",
     ]);
      $userInfo=$request->all();
      $user_create=User::create([
         'name'=> $userInfo['name'],
         'surname' => $userInfo['surname'],
         'patronymic'=>$userInfo['patronymic'],
         'email' => $userInfo['email'],
         'phone'=>$userInfo['phone'],
         "password"=> Hash::make($userInfo['password']),
         'id_role'=> 1,
      ]);
      if ($user_create)
      return redirect("/autho")->with("success","");
      return redirect()->back()->with("error","Произошла ошибка! Попробуйте снова!");
   }
   public function signout() { //выход из аутентификация
      Session::flush();
      Auth::logout();
      return redirect("/");
  }
   public function personal() { //открытие личного кабинета 
      return view('personalcub');
   }
   public function personal_information () { //вывод информации о пользователи 
       $personal = auth()->user();
       
    
       return view("personalcub", ["personalInfo"=> $personal]);
   }
   
}
