<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Socialite;
class facebookController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('laser/public/callback');
        }
 
        $authUser = $this->findOrCreateUser($user);
 
        Auth::login($authUser, true);
 
        return redirect('/');
    }
 
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
    	
        $authUser = User::where('fb_id', $facebookUser->id)->first();
 		
        if ($authUser!=null){
        	\Log::info($authUser);
            return $authUser;
        }
 		else{
	        $user = new User();
	        $user->name = $facebookUser->name;
	        $user->email = $facebookUser->email;
	        $user->fb_id = $facebookUser->id;
	        
	        $user->save();
	        return $user;
	    }
    }
}
