<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileSaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update()
    {
        $user = Auth::user();

        return view('admin.profile.update', ['user' => $user]);
    }

    public function save(ProfileSaveRequest $request)
    {
        $user = Auth::user();
        $password = $request->post('password');
        $user->name = $request->post('name');
        $user->email = $request->post('email');

        if(!empty($password)) {
            $user->password = \Hash::make($password);
        }
        $user->save();

        return redirect()->back();
    }
}
