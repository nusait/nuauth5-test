<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		echo 'hi!';
		if ( ! \Auth::attempt(['netid' => env('NETID'), 'password' => env('PW')])) {
			dd('Sorry you are not who you say you are :(');
		} else {
			$user = Auth::user();
			dd($user->toArray());
		}
		return view('welcome');
	}

}
