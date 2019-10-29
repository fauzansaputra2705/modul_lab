<?php

class Model_Pasien extends CI_Model {

	public function getAll()
	{
		return $this->db->get('pasien');
	}
	public function all_lab()
	{
		return $this->db->get('cetak_lab');
	}
	public function get_pasien($id)
	{
		return $this->db->get_where('pasien',['id_pasien' => $id])->row_array();
	}

	public function insert($datapasien)
	{
		return $this->db->insert('pasien', $datapasien);
	}

	public function hapus($id)
	{
		$this->db->where('id_pasien', $id);
		return $this->db->delete('pasien');
	}

	function edit($dataupdate)
	{
		$this->db->where('id_pasien', $this->input->post('id_pasien'));
		return $this->db->update('pasien', $dataupdate);
	}
}

