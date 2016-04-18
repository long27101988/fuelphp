<?php
namespace Admin;

class Controller_Authentical extends \Controller{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		return \View::forge('admin::authentical/index', $data);
	}

	public function action_login(){
		
	}

}
