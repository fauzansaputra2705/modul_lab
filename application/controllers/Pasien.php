<?php 
require APPPATH . 'libraries/REST_Controller.php';

class Pasien extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('model_Pasien');
  }

  public function renderLayout($data)
  {
    $this->load->view('layout/header',$data);
    $this->load->view('layout/content');
    $this->load->view('layout/footer');	
  }

  public function index()
  {
   $data ['title'] = "List Pasien";
   $data ['page'] = "Pasien";
   $data ['list_pasien'] = $this->model_Pasien->getAll();
   $data ['list_lab'] = $this->model_Pasien->all_lab();

   $this->renderLayout($data);
   $this->load->view('data/modal');
 }

 public function hapus_data($id)
 {
   $cekhapus = $this->model_Pasien->hapus($id);
   if ($cekhapus == TRUE) {
    redirect('Pasien/index','refresh');
  }else{
    echo 'Data Gagal dihapus';
  }
}

public function form_tambah()
{
 $data['title'] = "Form Tambah Data";
 $data['page'] = "FormTambahPasien";

 $this->renderLayout($data);
}

public function form_edit($id)
{
 $data['title'] = "Form Edit Data";
 $data['page'] = "FormEditPasien";
 $data['pasien'] = $this->model_Pasien->get_pasien($id);

 $this->renderLayout($data);
}

public function tambah_data()
{
 $id = $this->input->post('id_pasien');
 $no_rwt = $this->input->post('no_rawat');
 $no_rkm_mds = $this->input->post('no_rkm_medis');
 $nm_psn = $this->input->post('nm_pasien');
 $jenis_kelamin = $this->input->post('jenis_kelamin');
 $almt = $this->input->post('alamat');
 $penanggung_jwb = $this->input->post('penaggung_jwb');
 $hbng_pj = $this->input->post('hbng_pj');
 $jns_byr = $this->input->post('jenis_bayar');
 $kmr = $this->input->post('kamar');
 $trf_kmr = $this->input->post('trf_kmr');
 $diagniosa_awl = $this->input->post('diagnosa_awal');

 $datasimpan = array('id_pasien'=>$id, 'no_rawat'=>$no_rwt, 'no_rkm_medis'=>$no_rkm_mds, 'nm_pasien'=>$nm_psn, 'jenis_kelamin'=>$jenis_kelamin, 'alamat'=>$almt, 'penaggung_jwb'=>$penanggung_jwb, 'hbng_pj'=>$hbng_pj, 'jenis_bayar'=>$jns_byr, 'kamar'=>$kmr, 'trf_kmr'=>$trf_kmr, 'diagnosa_awal'=>$diagniosa_awl);

 $ceksimpan = $this->model_Pasien->insert($datasimpan);
 if ($ceksimpan == TRUE) {
  redirect('Pasien/index','refresh');
}else {
  redirect('Pasien/form_simpan','refresh');
}
}

public function edit_data() {

  $id = $this->input->post('id_pasien');
  $no_rwt = $this->input->post('no_rawat');
  $no_rkm_mds = $this->input->post('no_rkm_medis');
  $nm_psn = $this->input->post('nm_pasien');
  $jenis_kelamin = $this->input->post('jenis_kelamin');
  $almt = $this->input->post('alamat');
  $penanggung_jwb = $this->input->post('penaggung_jwb');
  $hbng_pj = $this->input->post('hbng_pj');
  $jns_byr = $this->input->post('jenis_bayar');
  $kmr = $this->input->post('kamar');
  $trf_kmr = $this->input->post('trf_kmr');
  $diagniosa_awl = $this->input->post('diagnosa_awal');

  $dataupdate = array('no_rawat'=>$no_rwt, 'no_rkm_medis'=>$no_rkm_mds, 'nm_pasien'=>$nm_psn, 'jenis_kelamin'=>$jenis_kelamin, 'alamat'=>$almt, 'penaggung_jwb'=>$penanggung_jwb, 'hbng_pj'=>$hbng_pj, 'jenis_bayar'=>$jns_byr, 'kamar'=>$kmr, 'trf_kmr'=>$trf_kmr, 'diagnosa_awal'=>$diagniosa_awl);

  $cekupdate = $this->model_Pasien->edit($dataupdate);
  if ($cekupdate == TRUE) {
    redirect('Pasien/index','refresh');
  }else {
    redirect('Pasien/form_edit','refresh');
  }
}

    /*function insert_dumy(){
        // jumlah data yang akan di insert
        $jumlah_data = 1000;
        for ($i=1;$i<=$jumlah_data;$i++){
            $data   =   array(
                "no_rawat"      =>  "171811".$i,
                "no_rkm_medis"  =>  "161711".$i,
                "nm_pasien"     =>  "Muhammad Fauzan Saputra $i",
                "alamat"        =>  "Kp.Sindangkarsa",
                "penaggung_jwb" =>  "Fauzan $i",
                "hbng_pj"       =>  "Ojan $i",
                "jenis_bayar"   =>  "Cash",
                "kamar"         =>  "Kamar",
                "trf_kmr"       =>  "1000000",
                "diagnosa_awal" =>  "Jantung"
            );
            $this->db->insert('pasien',$data); 
        }
        echo $i.' Data Berhasil Di Insert';
      }*/


      public function json()
      {
        $this->load->library('datatables');
        $this->datatables->select('id_pasien,no_rawat,no_rkm_medis,nm_pasien,jenis_kelamin,alamat,penaggung_jwb,hbng_pj,jenis_bayar,kamar,trf_kmr,diagnosa_awal');
        $this->datatables->add_column('edit', anchor('Pasien/form_edit/$1','Edit',array('class'=>'btn btn-primary')), 'id_pasien');
        $this->datatables->add_column('hapus', anchor('Pasien/hapus_data/$1','Hapus',array('class'=>'btn btn-danger')), 'id_pasien');
        $this->datatables->add_column('cetak', anchor('Pasien/index/$1', 'Action', array('class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#modalcetak'.'$1')), 'id_pasien');
        $this->datatables->from('pasien');
        return print_r($this->datatables->generate());
      }

    public function api()
    {
     
        $data = $this->db->get('pasien');
        $this->response($data, REST_Controller::HTTP_OK);
    }

      // public function json()
      // {
      //   $this->load->library('datatables');
      //   $this->datatables->select('id_pasien,no_rawat,no_rkm_medis,nm_pasien,jenis_kelamin,alamat,penaggung_jwb,hbng_pj,jenis_bayar,kamar,trf_kmr,diagnosa_awal');
      //   $this->datatables->add_column('edit', anchor('Pasien/form_edit/$1','Edit',array('class'=>'btn btn-primary')), 'id_pasien');
      //   $this->datatables->add_column('hapus', anchor('Pasien/hapus_data/$1','Hapus',array('class'=>'btn btn-danger')), 'id_pasien');
      //   $this->datatables->add_column('cetak', anchor('Pasien/index/$1', 'Action', array('class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#modalcetak'.'$1')), 'id_pasien');
      //   $this->datatables->from('pasien');
      //   return print_r($this->datatables->generate());
      // }



      public function export(){
    // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data ke excel
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Modul_Lab_Pasien.xls");
        
        $data['list'] = $this->model_Pasien->getAll();
        $this->load->view('data/export/exportpasien', $data);
      }

    }

    ?>