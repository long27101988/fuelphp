<?php

class Controller_Common extends Controller_Template{

	public function before(){
		parent::before();
		$controller = \Request::active()->controller;
		$action = \Request::active()->action;
		$arr_controller = explode("_", $controller);
		$ctrl = strtolower($arr_controller[1]);
		$ctrl_act = $ctrl.'.'.$action;
		if(Auth::check()){
			$groups = Auth::get_groups();
			if(!\Auth::acl()->has_access($ctrl_act, array('Simplegroup', $groups))){
				return Response::redirect('user/login');
			}
		}else{
			if(!\Auth::acl()->has_access($ctrl_act, array('Simplegroup', 0))){
				return Response::redirect('user/login');
			}
		}
	}
}
