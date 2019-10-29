<?php

class Dokter extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('model_Dokter');
    }

    public function renderLayout($data)
    {
      $this->load->view('layout/header',$data);
      $this->load->view('layout/content');
      $this->load->view('layout/footer');
  }

  public function index()
  {
   $data ['title'] = "List Dokter";
   $data ['page'] = "Dokter";
   $data ['list'] = $this->model_Dokter->getAll();

   $this->renderLayout($data);
   // $this->load->view('data/modal', $data);
}

public function hapus_data($id)
{
   $cekhapus = $this->model_Dokter->hapus($id);
   if ($cekhapus == TRUE) {
      redirect('Dokter/index','refresh');
  }else{
      echo 'Data Gagal dihapus';
  }
}

public function form_tambah()
{
   $data['title'] = "Form Tambah Data";
   $data['page'] = "FormTambahDokter";

   $this->renderLayout($data);
}
public function form_edit($id)
{
   $data['title'] = "Form Edit Data";
   $data['page'] = "FormEditDokter";
   $data['dokter'] = $this->model_Dokter->get_dokter($id);

   $this->renderLayout($data);
}

public function tambah_data()
{
   $id = $this->input->post('id_dokter');
   $kd_dktr = $this->input->post('kd_dokter');
   $nm_dktr = $this->input->post('nm_dokter');
   $jk = $this->input->post('jk');
   $tmpt_lhr = $this->input->post('tmp_lahir');
   $tgl_lhr = $this->input->post('tgl_lahir');
   $goldar = $this->input->post('gol_drh');
   $agm = $this->input->post('agama');

   $datasimpan = array('id_dokter'=>$id, 'kd_dokter'=>$kd_dktr, 'nm_dokter'=>$nm_dktr, 'jk'=>$jk, 'tmp_lahir'=>$tmpt_lhr, 'tgl_lahir'=>$tgl_lhr, 'gol_drh'=>$goldar, 'agama'=>$agm);

   $ceksimpan = $this->model_Dokter->insert($datasimpan);
   if ($ceksimpan == TRUE) {
      redirect('Dokter/index','refresh');
  }else {
      redirect('Dokter/form_simpan','refresh');
  }
}

public function edit_data() {

    $id = $this->input->post('id_dokter');
    $kd_dktr = $this->input->post('kd_dokter');
    $nm_dktr = $this->input->post('nm_dokter');
    $jk = $this->input->post('jk');
    $tmpt_lhr = $this->input->post('tmp_lahir');
    $tgl_lhr = $this->input->post('tgl_lahir');
    $goldar = $this->input->post('gol_drh');
    $agm = $this->input->post('agama');

    $dataupdate = array('id_dokter'=>$id, 'kd_dokter'=>$kd_dktr, 'nm_dokter'=>$nm_dktr, 'jk'=>$jk, 'tmp_lahir'=>$tmpt_lhr, 'tgl_lahir'=>$tgl_lhr, 'gol_drh'=>$goldar, 'agama'=>$agm);

    $cekupdate = $this->model_Dokter->edit($dataupdate);
    if ($cekupdate == TRUE) {
      redirect('Dokter/index','refresh');
  }else {
      redirect('Dokter/form_edit','refresh');
  }
}
function insert_dumy(){
        // jumlah data yang akan di insert
    $jumlah_data = 1000;
    for ($i=1;$i<=$jumlah_data;$i++){
        $data   =   array(
            "kd_dokter"     =>  "112233".$i,
            "nm_dokter"     =>  "Muhammad Fauzan Saputra".$i,
            "jk"            =>  "L",
            "tmp_lahir"     =>  "Kp.Sindangkarsa",
            "tgl_lahir"       =>  "2002-05-27",
            "gol_drh"       =>  "B",
            "agama"         =>  "Islam",
        );
        $this->db->insert('dokter',$data); 
    }
    echo $i.' Data Berhasil Di Insert';
}


public function json()
{
  $this->load->library('datatables');
  $this->datatables->select('id_dokter,kd_dokter,nm_dokter,jk,tmp_lahir,tgl_lahir,gol_drh,agama');
  $this->datatables->add_column('edit', anchor('Dokter/form_edit/$1','Edit',array('class'=>'btn btn-primary')), 'id_dokter');
  $this->datatables->add_column('hapus', anchor('Dokter/hapus_data/$1','Hapus',array('class'=>'btn btn-danger')), 'id_dokter');
  $this->datatables->from('dokter');
  return print_r($this->datatables->generate());
}

public function export(){
    // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data ke excel
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Modul_Lab_Dokter.xls");
    
    $data['list'] = $this->model_Dokter->getAll();
    $this->load->view('data/export/exportdokter', $data);
}

}
?>