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
			'personal_number' => 'required|numeric|min:111111111111|max:999999999999',
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

	// 
	public function getEditProfile(){
		return View::make('editProfile')->with('user', Auth::user());
	}

	// 
	public function postEditProfile(){
		// 
		$rules = array(
			'password' => 'required|min:4',
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
			return Redirect::to('myprofile/edit')->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$user = Auth::user();

			DB::transaction(function() use ($user)
			{
				$user->password = Input::get('password');
				$user->firstname = Input::get('firstname');
				$user->lastname = Input::get('lastname');
				$user->adress = Input::get('adress');
				$user->zip_code = Input::get('zip_code');
				$user->city = Input::get('city');
				$user->country = Input::get('country');
				$user->save();
			});

			return Redirect::to('myprofile/edit');
		}
	}

}


// {{ Form::password('password', array('placeholder' => 'Password')) }}
// {{ Form::text('firstname', null, array('placeholder' => 'Firstname')) }}
// {{ Form::text('lastname', null, array('placeholder' => 'Lastname')) }}
// {{ Form::text('adress', null, array('placeholder' => 'Adress')) }}
// {{ Form::text('zip_code', null, array('placeholder' => 'Zip Code')) }}
// {{ Form::text('city', null, array('placeholder' => 'City')) }}
// {{ Form::text('country', null, array('placeholder' => 'Country')) }}