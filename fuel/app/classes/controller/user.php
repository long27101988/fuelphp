<?php 

class Controller_User extends Controller_Common{

	public function action_login(){
		return Response::forge(View::forge('user/login'));
	}

	public function action_post_login(){
	$pr = Input::method();
		if(Input::method() == "POST"){
			$params = Input::param();

			if(Auth::login($params['username'], $params['password'])){
				if(!empty($params['remember'])){
					Auth::remember_me();
				}else{
					Auth::dont_remember_me();
				}
				Response::redirect("hello/{$params['username']}");
			}else{
				Message::error(__('login.failure'));
			}
		}else{
			Message::error(__('login.failure'));
		}
	}

	public function action_signup(){
		if(Auth::check()){
			Response::redirect('/hello');
		}
		if(Input::method() == "POST"){
			$params = Input::param();
			$val = Validation::forge('user_signup');
			$val->add('username', 'Your username')->add_rule('required');
			$val->add('password', 'Your password')->add_rule('required')
				->add_rule('min_length', 6)
				->add_rule('max_length', 10);
			$val->add('email', 'Your email')->add_rule('required');

			if($val->run()){
				$create_user = Auth::create_user(
					$val->validated('username'),
					$val->validated('password'),
					$val->validated('email'),
					'100'
				);

				if($create_user){
					Session::set_flash('notice', 'FLASH: User created');
					Response::redirect('hello');
				}
			}

		}
		return View::forge('user/signup');
        /*$this->template->title = 'Sign Up';
		$this->template->content = View::forge('index/signup');*/
	}

}