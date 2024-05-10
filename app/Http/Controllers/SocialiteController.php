<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('google_id', $user->id)->orWhere('email', $user->email)->first();

        if ($existingUser) {
            if (! $existingUser->google_id) {
                $existingUser->google_id = $user->id;
                $existingUser->save();
            }
        } else {
            $newUser = User::updateOrCreate(
                [
                    'google_id' => $user->id
                ],
                [
                    'name' => $user->name, 
                    'email' => $user->email, 
                    'password' => encrypt('fromsocialwebsite')
                ]
            );
        }
        
        Auth::login($existingUser ?: $newUser);
        
        return redirect()->intended(route('dashboard', absolute: false));
	}
}
