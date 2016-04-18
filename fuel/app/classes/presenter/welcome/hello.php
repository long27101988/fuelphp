<?php

/**
 * The welcome hello presenter.
 *
 * @package  app
 * @extends  Presenter
 */
class Presenter_Welcome_Hello extends Presenter
{
	/**
	 * Prepare the view data, keeping this in here helps clean up
	 * the controller.
	 *
	 * @return void
	 */
	public function view()
	{
		$arr_user = Model_User::find('all');
		$this->data = $arr_user;
		$this->name = "long";
		$this->tp =  'the phuc';
	}
}
