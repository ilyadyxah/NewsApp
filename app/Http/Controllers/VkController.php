<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class VkController extends Controller
{
    public function loginVk()
    {
        if(Auth::id()) {
            return redirect()->route('news::index');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVk()
    {
        $user = Socialite::driver('vkontakte')->user();
        $ownUser = User::query()
            ->where('id_in_soc' , $user->getId())
            ->where('type_auth', 'vk')
            ->first();
        if (is_null($ownUser)) {
            $ownUser = new User();
            $ownUser->fill([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => \Hash::make('1234'),
                'id_in_soc' => $user->getId(),
                'type_auth' => 'vk',
                'avatar' => $user->getAvatar(),
            ])->save();
        }
        Auth::login($ownUser);
        return redirect()->route('news::index');
    }
}
