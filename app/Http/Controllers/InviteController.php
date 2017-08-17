<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Invite;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{
   	
 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth:admin');
    }


   	public function invite()
	{
	    // show the user a form with an email field to invite a new user
	     return view('invite');
	}

	public function process(Request $request)
	{
	    // validate the incoming request data

	    do {
	        //generate a random string using Laravel's str_random helper
	        $token = str_random();
	    } 
	    //check if the token already exists and if it does, try again
	    while (Invite::where('token', $token)->first());

	    //create a new invite record
	    	$invite = Invite::create([
	        'email' => $request->get('email'),
	        'token' => $token
	    ]);

	    // send the email
	    Mail::to($request->get('email'))->send(new InviteCreated($invite));

	    // redirect back where we came from
	 	return view('home');
	}

	public function accept($token)
	{
	    // here we'll look up the user by the token sent provided in the URL
	    // Look up the invite
	    if (!$invite = Invite::where('token', $token)->first()) {
	        //if the invite doesn't exist do something more graceful than this
	        abort(404);
	    }

	    // create the user with the details from the invite
	    User::create(['email' => $invite->email, 'name' => 'Kacilla', 'password' => '123456', 'admin_id' => '1']);

	    // delete the invite so it can't be used again
	    $invite->delete();

	    // here you would probably log the user in and show them the dashboard, but we'll just prove it worked

	    return 'Good job! Invite accepted!';
		}
}
