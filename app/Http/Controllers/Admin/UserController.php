<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('updated_at', 'desc')->paginate(5);

        return view('admin.user.index', ['user' => $user]);
    }

    public function create()
    {
        return view('admin.user.create', [
            'user' => new User(),
            'title' => 'Создание пользователя'
        ]);
    }

    public function update(User $user)
    {
        return view("admin.user.create", [
                'user' => $user,
                'title' => 'Редактирование пользователя'
            ]
        );
    }

    public function delete($id)
    {
        User::destroy([$id]);

        return redirect()->route("admin::user::index");
    }

    public function save(Request $request)
    {
        $id = $request->post('id');
        $user = User::find($id);
        $this->validate($request, User::rulesUpdate());
        $result = User::updateUser($user, $request);

        return redirect()->route("admin::user::index")
            ->with('success', $result);
    }
}
