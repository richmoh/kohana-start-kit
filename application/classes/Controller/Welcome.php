<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public function action_index()
	{
		$this->template->view = new View('home');
	}
    
	public function action_start()
	{
		$this->response->body('hello, world!');
	}
    
	public function action_signup()
	{
		$this->template->view = new View('signup');
	}

} // End Welcome
