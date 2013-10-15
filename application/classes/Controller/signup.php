<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Signup extends Controller {

	public function action_index()
	{
		$this->response->body('hello, signup!');
	}
    
	public function action_start()
	{
		$this->response->body('hello, world!');
	}

} // End Welcome
