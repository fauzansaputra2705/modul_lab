<?php


class PasienApi extends CI_Controller {

	public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->load->model('model_Pasien');
    }

	public function index()
	{
        $data = $this->model_Pasien->getAll()->result();
        $tes['data']=$data;
        echo json_encode($tes);
	}

}