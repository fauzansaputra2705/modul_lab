<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Account');
	}

	public function index()
	{
		$ammount = 20;
		$sender_id = 1;
		$receiver_id = 2;

		$this->Model_Account->transfer($ammount, $sender_id, $receiver_id);
	}

}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */