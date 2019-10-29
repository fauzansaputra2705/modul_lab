<?php

class Model_Dokter extends CI_Model {

	public function getAll()
	{
		return $this->db->get('dokter');
	}

	function get_dokter($id)
	{
		return $this->db->get_where('dokter',['id_dokter' => $id])->row_array();
	}

	public function insert($datadokter)
	{
		return $this->db->insert('dokter', $datadokter);
	}

	public function hapus($id)
	{
		$this->db->where('id_dokter', $id);
		return $this->db->delete('dokter');
	}

	function edit($dataupdate)
	{
		$this->db->where('id_dokter', $this->input->post('id_dokter'));
		return $this->db->update('dokter', $dataupdate);
	}

}