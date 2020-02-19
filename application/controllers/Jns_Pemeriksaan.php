<?php
class Jns_Pemeriksaan extends Ci_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Model_Jnspemeriksaan');
	}

	public function renderLayout($data)
	{
		$this->load->view('layout/header',$data);
       $this->load->view('layout/content');
       $this->load->view('layout/footer');	
   }
   public function index()
   {
       $data ['title'] = "Jenis Pemeriksaan";
       $data ['page'] = "Pemeriksaan";
       $data ['list'] = $this->Model_Jnspemeriksaan->getAll();

       $this->renderLayout($data);
   }

   public function hapus_data($id)
   {
       $cekhapus = $this->Model_Jnspemeriksaan->hapus($id);
       if ($cekhapus == TRUE) {
          redirect('Jns_Pemeriksaan/index','refresh');
      }else{
          echo 'Data Gagal dihapus';
      }
  }

  public function form_tambah()
  {
   $data['title'] = "Form Tambah Pemeriksaan";
   $data['page'] = "FormTambahPemeriksaan";

   $this->renderLayout($data);
}

// public function form_edit($id)
// {
//    $data['title'] = "Form Edit Pemeriksaan";
//    $data['page'] = "FormEditPemeriksaan";
//    $data['pemeriksaan'] = $this->Model_Jnspemeriksaan->get_pemeriksaan($id);

//    $this->renderLayout($data);
// }

public function tambah_data()
{
   $id = $this->input->post('id_jenis_perawat');
   $kode = $this->input->post('kode_periksa');
   $nama_periksa = $this->input->post('nama_pemeriksaan');
   $tarif = $this->input->post('tarif');

   $datasimpan = array('id_jenis_perawat'=>$id, 'kode_periksa'=>$kode, 'nama_pemeriksaan'=>$nama_periksa, 'tarif'=>$tarif);

   $ceksimpan = $this->Model_Jnspemeriksaan->insert($datasimpan);
   if ($ceksimpan == TRUE) {
      redirect('Jns_Pemeriksaan/index','refresh');
  }else {
      redirect('Jns_Pemeriksaan/form_simpan','refresh');
  }
}

    // public function edit_data() {

    //     $id = $this->input->post('id_jenis_perawat');
    //     $kode = $this->input->post('kode_periksa');
    //     $nama_periksa = $this->input->post('nama_pemeriksaan');
    //     $tarif = $this->input->post('tarif');

    // 	$dataupdate = array('id_jenis_perawat'=>$id, 'kode_periksa'=>$kode, 'nama_pemeriksaan'=>$nama_periksa, 'tarif'=>$tarif);

    // 	$cekupdate = $this->Model_Jnspemeriksaan->edit($dataupdate);
    // 	if ($cekupdate == TRUE) {
    // 		redirect('Jns_Pemeriksaan/index','refresh');
    // 	}else {
    // 		redirect('Jns_Pemeriksaan/form_edit','refresh');
    // 	}
    // }
function insert_dumy(){
        // jumlah data yang akan di insert
    $jumlah_data = 1000;
    for ($i=1;$i<=$jumlah_data;$i++){
        $data   =   array(
            "id_jenis_perawat" =>  "",
            "kode_periksa"     =>  "LAB0200".$i,
            "nama_pemeriksaan" =>  "darah".$i,
            "tarif"            =>  "5000".$i,
        );
        $this->db->insert('jns_perawatan_lab',$data); 
    }
    echo $i.' Data Berhasil Di Insert';
}

public function json()
{
  $this->load->library('datatables');
  $this->datatables->select('id_jenis_perawat, kode_periksa, nama_pemeriksaan, tarif');
  $this->datatables->add_column('edit', anchor('Jns_Pemeriksaan/form_edit/$1','Edit',array('class'=>'btn btn-primary')), 'id_jenis_perawat');
  $this->datatables->add_column('hapus', anchor('Jns_Pemeriksaan/hapus_data/$1','Hapus',array('class'=>'btn btn-danger')), 'id_jenis_perawat');
  $this->datatables->from('jns_perawatan_lab');
  return print_r($this->datatables->generate());
}

public function export(){
    // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data ke excel
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Modul_Lab_Pemeriksaan.xls");
    
    $data['list'] = $this->Model_Jnspemeriksaan->getAll();
    $this->load->view('data/export/exportpemeriksaan', $data);
}


}