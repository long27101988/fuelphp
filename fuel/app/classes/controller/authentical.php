<?php

class Controller_Authentical extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Authentical &raquo; Index';
		$this->template->content = View::forge('authentical/index', $data);
	}

}
