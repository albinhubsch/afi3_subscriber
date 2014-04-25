<?php

class ApiController extends \BaseController {

	public function getApikey(){
		// 
		return View::make('getApikey');
	}

	public function postApikey(){
		// 
		$rules = array(
			'password' => 'required|min:4'
		);

		//Runs the validation
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('api/getKey')->withErrors($validator)->withInput(Input::except('password'));
		}else{
			
			$api_user = new ApiUser(Input::all());
			$api_user->api_key = sha1(microtime(true).mt_rand(10000,90000));

			DB::transaction(function() use ($api_user)
			{
				$api_user->save();
			});

			return View::make('createdApiKey')->with('api_key', $api_user->api_key);
		}

	}

	//
	public function getSubscriberData($subscription_number){

		$subscriber = Subscriber::where('subscription_number', '=', $subscription_number)->first();

		if($subscriber == null){
			return Response::json(array(
				'error' => true,
				'message' => 'no such user in database'),
				200
			);
		}

		return Response::json(array(
			'error' => false,
			'subscriber' => $subscriber->toArray()),
			200
		);
	}

	public function postNewSubscriber(){

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

			return Response::json(array(
				'error' => true,
				'message' => $validator->errors()->toArray()),
				200
			);

		}else{
			$user = new Subscriber(Input::all());
			$user->subscription_number = 0;

			DB::transaction(function() use ($user)
			{
				$user->save();
				$user->subscription_number = 1000 + $user->id;
				$user->save();
			});

			return Response::json(array(
				'error' => false,
				'message' => 'ok'),
				200
			);
		}

	}

}
