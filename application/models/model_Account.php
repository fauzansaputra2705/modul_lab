<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Account extends CI_Model {

	public function transfer($ammount, $from, $to)
	{
		$sender = 'UPDATE accounts SET balance = balance - ? WHERE user_id = ?';
		$receiver = 'UPDATE accounts SET balance = balance + ? WHERE user_id = ?';

		$this->db->trans_start();
		$this->db->query($sender, array($ammount, $from));
		$this->db->query($receiver, array($ammount, $to));
		$this->db->trans_complete();

		if ($this->db->trans_status() === false) {
			echo 'rollback';
		}else {
			echo 'commited!';
		}
		
	}

}

/* End of file model_Account.php */
/* Location: ./application/models/model_Account.php */