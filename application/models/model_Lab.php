<?php

class Model_Lab extends CI_Model {



//datatables serverside petugas
	var $table = 'petugas'; //nama tabel dari database
    var $column_order = array(null, 'id_petugas','nip','nama','jk','tmp_lahir','tgl_lahir','gol_darah','agama'); //field yang ada di table petugas
    var $column_search = array('nip','nama'); //field yang diizin untuk pencarian 
    var $order = array('id_petugas' => 'asc'); // default order

    public function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    }

    private function get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
//tutup datatables serverside petugas














//datatables serverside dokter
    var $table1 = 'dokter'; //nama tabel dari database
    var $column_order1 = array(null, 'id_dokter','kd_dokter','nm_dokter','jk','tmp_lahir','tgl_lahir','gol_darah','agama'); //field yang ada di table dokter
    var $column_search1 = array('kd_dokter','nm_dokter'); //field yang diizin untuk pencarian 
    var $order1 = array('id_dokter' => 'asc'); // default order

    public function __construct1()
    {
        parent::__construct1();
        $this->load->database();
    }

    private function get_datatables_query1()
    {
         
        $this->db->from($this->table1);
 
        $i = 0;
     
        foreach ($this->column_search1 as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search1) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order1'])) 
        {
            $this->db->order_by($this->column_order1[$_POST['order1']['0']['column']], $_POST['order1']['0']['dir']);
        } 
        else if(isset($this->order1))
        {
            $order1 = $this->order1;
            $this->db->order_by(key($order1), $order1[key($order1)]);
        }
    }
 
    function get_datatables1()
    {
        $this->get_datatables_query1();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered1()
    {
        $this->get_datatables_query1();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all1()
    {
        $this->db->from($this->table1);
        return $this->db->count_all_results();
    }
//tutup datatables serverside dokter










//datatables serverside jenis perawatan
    var $table2 = 'jns_perawatan_lab'; //nama tabel dari database
    var $column_order2 = array(null, 'id_jenis_perawat','kode_periksa','nama_pemeriksaan','tarif'); //field yang ada di table jenis pemeriksaan
    var $column_search2 = array('kode_periksa','nama_pemeriksaan'); //field yang diizin untuk pencarian 
    var $order2 = array('id_jenis_perawat' => 'asc'); // default order

    public function __construct2()
    {
        parent::__construct2();
        $this->load->database();
    }

    private function get_datatables_query2()
    {
         
        $this->db->from($this->table2);
 
        $i = 0;
     
        foreach ($this->column_search2 as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search1) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order2'])) 
        {
            $this->db->order_by($this->column_order2[$_POST['order2']['0']['column']], $_POST['order2']['0']['dir']);
        } 
        else if(isset($this->order2))
        {
            $order2 = $this->order2;
            $this->db->order_by(key($order2), $order2[key($order2)]);
        }
    }
 
    function get_datatables2()
    {
        $this->get_datatables_query2();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered2()
    {
        $this->get_datatables_query2();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all2()
    {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }
//tutup datatables serverside jenis pemeriksaan












	public function getAll()
	{
		return $this->db->get('cetak_lab');
	}
    public function insert($datalab)
    {
        return $this->db->insert('cetak_lab',$datalab);
    }
    public function update($datalab)
    {
        $this->db->where('id_cetak_lab', $this->input->post('id_cetak_lab'));
        return $this->db->update('cetak_lab', $datalab);
    }
    public function all_lab()
    {
        return $this->db->get('cetak_lab');
    }
	public function allpasien()
	{
		return $this->db->get('pasien');
	}
    public function allpemeriksaan(){
        return $this->db->get('jns_perawatan_lab');
    }
    /*public function allpetugas(){
        return $this->db->get('petugas');
    }*/
	public function get_pasien($id)
	{
		return $this->db->get_where('pasien',['id_pasien' => $id])->row_array();
	}
    public function get_lab($id)
    {
        return $this->db->get_where('cetak_lab',['id_cetak_lab' => $id])->row_array();
    }
	public function get_pemeriksaan($id)
	{
		return $this->db->get_where('jns_perawatan_lab',['id_jns_perawat' => $id])->row_array();
	}
}

/* End of file model_Lab.php */
/* Location: ./application/models/model_Lab.php */