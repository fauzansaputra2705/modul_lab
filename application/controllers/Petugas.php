<?php
class Petugas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('model_Petugas');
    }

    public function renderLayout($data)
    {
      $this->load->view('layout/header',$data);
      $this->load->view('layout/content');
      $this->load->view('layout/footer');	
  }

  public function index()
  {
   $data ['title'] = "List Petugas";
   $data ['page'] = "Petugas";
   $data ['list'] = $this->model_Petugas->getAll();

   $this->renderLayout($data);
}

public function hapus_data($id)
{
   $cekhapus = $this->model_Petugas->hapus($id);
   if ($cekhapus == TRUE) {
      redirect('Petugas/index','refresh');
  }else{
      echo 'Data Gagal dihapus';
  }
}

public function form_tambah()
{
   $data['title'] = "Form Tambah Data";
   $data['page'] = "FormTambahPetugas";

   $this->renderLayout($data);
}
public function form_edit($id)
{
   $data['title'] = "Form Edit Data";
   $data['page'] = "FormEditPetugas";
   $data['petugas'] = $this->model_Petugas->get_petugas($id);

   $this->renderLayout($data);
}

public function tambah_data()
{
   $id = $this->input->post('id_petugas');
   $nip = $this->input->post('nip');
   $nm = $this->input->post('nama');
   $jk = $this->input->post('jk');
   $tmpt_lhr = $this->input->post('tmp_lahir');
   $tgl_lhr = $this->input->post('tgl_lahir');
   $goldar = $this->input->post('gol_drh');
   $agm = $this->input->post('agama');

   $datasimpan = array('id_petugas'=>$id, 'nip'=>$nip, 'nama'=>$nm, 'jk'=>$jk, 'tmp_lahir'=>$tmpt_lhr, 'tgl_lahir'=>$tgl_lhr, 'gol_drh'=>$goldar, 'agama'=>$agm);

   $ceksimpan = $this->model_Petugas->insert($datasimpan);
   if ($ceksimpan == TRUE) {
      redirect('Petugas/index','refresh');
  }else {
      redirect('Petugas/form_simpan','refresh');
  }
}

public function edit_data() {

    $id = $this->input->post('id_petugas');
    $nip = $this->input->post('nip');
    $nm = $this->input->post('nama');
    $jk = $this->input->post('jk');
    $tmpt_lhr = $this->input->post('tmp_lahir');
    $tgl_lhr = $this->input->post('tgl_lahir');
    $goldar = $this->input->post('gol_drh');
    $agm = $this->input->post('agama');

    $dataupdate = array('id_petugas'=>$id, 'nip'=>$nip, 'nama'=>$nm, 'jk'=>$jk, 'tmp_lahir'=>$tmpt_lhr, 'tgl_lahir'=>$tgl_lhr, 'gol_drh'=>$goldar, 'agama'=>$agm);

    $cekupdate = $this->model_Petugas->edit($dataupdate);
    if ($cekupdate == TRUE) {
      redirect('Petugas/index','refresh');
  }else {
      redirect('Petugas/form_edit','refresh');
  }
}

function insert_dumy(){
        // jumlah data yang akan di insert
    $jumlah_data = 1000;
    for ($i=1;$i<=$jumlah_data;$i++){
        $data   =   array(
            "nip"           =>  "112233".$i,
            "nama"          =>  "Muhammad Fauzan Saputra".$i,
            "jk"            =>  "L",
            "tmp_lahir"     =>  "Kp.Sindangkarsa",
            "tgl_lahir"     =>  "2002-05-27",
            "gol_drh"       =>  "B",
            "agama"         =>  "Islam",
        );
        $this->db->insert('petugas',$data); 
    }
    echo $i.' Data Berhasil Di Insert';
}

public function json()
{
  $this->load->library('datatables');
  $this->datatables->select('id_petugas,nip,nama,jk,tmp_lahir,tgl_lahir,gol_drh,agama');
  $this->datatables->add_column('edit', anchor('Petugas/form_edit/$1','Edit',array('class'=>'btn btn-primary')), 'id_petugas');
  $this->datatables->add_column('hapus', anchor('Petugas/hapus_data/$1','Hapus',array('class'=>'btn btn-danger')), 'id_petugas');
  $this->datatables->from('petugas');
  return print_r($this->datatables->generate());
}

public function export(){
    // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data ke excel
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Modul_Lab_Petugas.xls");
    
    $data['list'] = $this->model_Petugas->getAll();
    $this->load->view('data/export/exportpetugas', $data);
}
}