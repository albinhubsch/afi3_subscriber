<?php

class SubscriberController extends \BaseController {

	// 
	public function getRegistration(){
		// 
		return View::make('registration');
	}

	// 
	public function postRegistration(){
		// 
		$rules = array(
			'email' => 'required|email|unique:subscribers,email',
			'password' => 'required|min:4',
			'personal_number' => 'required|integer|min:111111111111|max:999999999999',
			'firstname' => 'required|alpha|min:2|max:42',
			'lastname' => 'required|alpha|min:2|max:42',
			'adress' => 'required|min:2|max:128',
			'zip_code' => 'required|alpha_num|min:3|max:16',
			'city' => 'required|alpha|max:128',
			'country' => 'required|alpha|max:128',
		);

		//Runs the validation
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('registration')->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$user = new Subscriber(Input::all());
			$user->subscription_number = 0;

			DB::transaction(function() use ($user)
			{
				$user->save();
				$user->subscription_number = 1000 + $user->id;
				$user->save();
			});

			return Redirect::to('login');
		}
	}

	// 
	public function getLogin(){
		// 
		return View::make('login');
	}

	// 
	public function postLogin(){
		$rules = array(
			'email' => 'required|email', //Make sure email is actually email
			'password' => 'required|min:4' // password can only be greater than 4 characters
		);

		//Runs the validation
		$validator = Validator::make(Input::all(), $rules);

		//If validator fails, return errors and redirect to login page.
		if($validator->fails()){
			return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
		}else{

			if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))){
				return Redirect::to('myprofile');
			}else{
				return Redirect::to('login');
			}
		}
	}

	// 
	public function getLogout(){
		Auth::logout();
		return Redirect::to('login');
	}

	// 
	public function getProfile(){
		// 
		return View::make('myProfile')->with('user', Auth::user());
	}

}
