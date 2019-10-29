<?php
class Model_Jnspemeriksaan extends CI_Model {
	public function getAll()
	{
		return $this->db->get('jns_perawatan_lab');
	}

	function get_pemeriksaan($id)
	{
		return $this->db->get_where('jns_perawatan_lab',['id_jenis_perawat' => $id])->row_array();
	}

	public function insert($datapasien)
	{
		return $this->db->insert('jns_perawatan_lab', $datapasien);
	}

	public function hapus($id)
	{
		$this->db->where('id_jenis_perawat', $id);
		return $this->db->delete('jns_perawatan_lab');
	}

	function edit($dataupdate)
	{
		$this->db->where('id_jenis_perawat', $this->input->post('id_jenis_perawat'));
		return $this->db->update('jns_perawatan_lab', $dataupdate);
	}

}