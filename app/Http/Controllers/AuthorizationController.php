<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function authorization()
    {
        return '<form name="auth" method="post" action="#">
                   <input type="text" name="first_name" placeholder="Имя"><br>
                   <input type="text" name="last_name" placeholder="Фамилия"><br>
                   <input type="email" name="email" placeholder="Почта"><br>
                   <input type="submit" name="submit" value="Зарегистрироваться">';
    }
}
