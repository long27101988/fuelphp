<?php
namespace Admin;

class Controller_Welcome extends \Controller
{
	
	public function action_index(){
		/*$log = new Logger('long');
		$log->addWarning('dasdas');*/
		return \Response::forge(\View::forge('admin::welcome/index'));
	}
	public function action_create(){
		$params = \Input::param();
		var_dump($params);die('dfsdaf');
	}
}
