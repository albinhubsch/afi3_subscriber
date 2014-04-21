<?php

class ApiController extends \BaseController {

	// 
	public function getSubscriberData($subscription_number){
		// 
		$subscriber = Subscriber::where('subscription_number', '=', $subscription_number)->first();

		// return $subscriber;

		return Response::json(array(
			'error' => false,
			'subscriber' => $subscriber->toArray()),
			200
		);
	}

}