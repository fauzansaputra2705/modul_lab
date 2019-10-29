<?php

class Model_Petugas extends CI_Model {

	public function getAll()
	{
		return $this->db->get('petugas');
	}

	function get_petugas($id)
	{
		return $this->db->get_where('petugas',['id_petugas' => $id])->row_array();
	}

	public function insert($datapetugas)
	{
		return $this->db->insert('petugas', $datapetugas);
	}

	public function hapus($id)
	{
		$this->db->where('id_petugas', $id);
		return $this->db->delete('petugas');
	}

	function edit($dataupdate)
	{
		$this->db->where('id_petugas', $this->input->post('id_petugas'));
		return $this->db->update('petugas', $dataupdate);
	}

}
