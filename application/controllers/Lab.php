<?php

class Lab extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('Model_Lab');
  }

  public function renderLayout($data)
  {
    $this->load->view('layout/header',$data);
    $this->load->view('layout/content');
    $this->load->view('layout/footer');	
  }

  public function index($id)
  {
    $data['page'] = "Lab";
    $data['title'] = "Tambah Laboratorium";
    $data['list_pasien'] = $this->Model_Lab->allpasien();
    $data['list_lab'] = $this->Model_Lab->all_lab();
    $data['pemeriksaan'] = $this->Model_Lab->allpemeriksaan();
    $data['pasien'] = $this->Model_Lab->get_pasien($id);

    $this->renderLayout($data);
    $this->load->view('data/modal');
  }

  public function cetak($id)
  {
    /*ob_start();
    $data['lab'] = $this->Model_Lab->get_lab($id);
    $this->load->view('data/lab/cetaklab',$data);
    $html = ob_get_contents();
    ob_end_clean();
    require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Hasil Laboratorium.pdf', 'D');*/

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "Hasil_Laboratorium.pdf";
    $data['lab'] = $this->Model_Lab->get_lab($id);
    $this->pdf->load_view('data/lab/cetaklab',$data);


  }

  public function cetakpdf(){

  }


  public function form_edit($id)
  {
    $data['page'] = "EditLab";
    $data['title'] = "Edit Laboratorium";
    $data['lab'] = $this->Model_Lab->get_lab($id);

    $this->renderLayout($data);

  }

  public function tambah_lab()
  {
    $id = $this->input->post('id_cetak_lab');
    $no_rekam_medis = $this->input->post('no_rkm_medis');
    $nama_pasien = $this->input->post('nm_pasien');
    $jkumur = $this->input->post('jk_umur');
    $alamat = $this->input->post('alamat');
    $no_periksa = $this->input->post('no_periksa');
    $penanggung_jawab = $this->input->post('penggung_jwb');
    $dokter_pengirim = $this->input->post('dokter_pengirim');
    $tanggal_pemeriksaan = $this->input->post('tgl_pemeriksaan');
    $jam_pemeriksaan = $this->input->post('jam_pemeriksaan');
    $poli = $this->input->post('poli');
    $jenis_pemeriksaan = implode(".",$this->input->post('jenis_pemeriksaan'));
    $hasil = implode(".",$this->input->post('hasil'));
    $satuan = implode(".",$this->input->post('satuan'));
    $nilai_rujukan = implode(".",$this->input->post('nilai_rujukan'));
    $keterangan = implode(".",$this->input->post('keterangan'));
    $catatan = $this->input->post('catatan');
    $tanggal_cetak = $this->input->post('tanggal_cetak');
    $petugas_lab = $this->input->post('petugas_lab');
    $biaya = implode(".",$this->input->post('biaya'));

    $simpanlab = array('id_cetak_lab'=>$id, 'no_rkm_medis'=>$no_rekam_medis, 'nm_pasien'=>$nama_pasien, 'jk_umur'=>$jkumur, 'alamat'=>$alamat, 'no_periksa'=>$no_periksa, 'penggung_jwb'=>$penanggung_jawab, 'dokter_pengirim'=>$dokter_pengirim, 'tgl_pemeriksaan'=>$tanggal_pemeriksaan, 'jam_pemeriksaan'=>$jam_pemeriksaan, 'poli'=>$poli,'jenis_pemeriksaan'=>$jenis_pemeriksaan, 'hasil'=>$hasil, 'satuan'=>$satuan, 'nilai_rujukan'=>$nilai_rujukan, 'keterangan'=>$keterangan, 'catatan'=>$catatan, 'tanggal_cetak'=>$tanggal_cetak, 'petugas_lab'=>$petugas_lab, 'biaya'=>$biaya);

    $ceksimpan = $this->Model_Lab->insert($simpanlab);
    if (ceksimpan==true) {
      redirect('Pasien');
    }else{
      redirect('Lab');
    }
  }

  public function edit_lab()
  {
    $id = $this->input->post('id_cetak_lab');
    $no_rekam_medis = $this->input->post('no_rkm_medis');
    $nama_pasien = $this->input->post('nm_pasien');
    $jkumur = $this->input->post('jk_umur');
    $alamat = $this->input->post('alamat');
    $no_periksa = $this->input->post('no_periksa');
    $penanggung_jawab = $this->input->post('penggung_jwb');
    $dokter_pengirim = $this->input->post('dokter_pengirim');
    $tanggal_pemeriksaan = $this->input->post('tgl_pemeriksaan');
    $jam_pemeriksaan = $this->input->post('jam_pemeriksaan');
    $jenis_pemeriksaan = implode(".",$this->input->post('jenis_pemeriksaan'));
    $poli = $this->input->post('poli');
    $hasil = implode(".",$this->input->post('hasil'));
    $satuan = implode(".",$this->input->post('satuan'));
    $nilai_rujukan = implode(".",$this->input->post('nilai_rujukan'));
    $keterangan = implode(".",$this->input->post('keterangan'));
    $catatan = $this->input->post('catatan');
    $tanggal_cetak = $this->input->post('tanggal_cetak');
    $petugas_lab = $this->input->post('petugas_lab');
    $biaya = implode(".",$this->input->post('biaya'));

    $simpanlab = array('no_rkm_medis'=>$no_rekam_medis, 'nm_pasien'=>$nama_pasien, 'jk_umur'=>$jkumur, 'alamat'=>$alamat, 'no_periksa'=>$no_periksa, 'penggung_jwb'=>$penanggung_jawab, 'dokter_pengirim'=>$dokter_pengirim, 'tgl_pemeriksaan'=>$tanggal_pemeriksaan, 'jam_pemeriksaan'=>$jam_pemeriksaan, 'poli'=>$poli,'jenis_pemeriksaan'=>$jenis_pemeriksaan, 'hasil'=>$hasil, 'satuan'=>$satuan, 'nilai_rujukan'=>$nilai_rujukan, 'keterangan'=>$keterangan, 'catatan'=>$catatan, 'tanggal_cetak'=>$tanggal_cetak, 'petugas_lab'=>$petugas_lab, 'biaya'=>$biaya);

    $ceksimpan = $this->Model_Lab->update($simpanlab);
    if (ceksimpan==true) {
      redirect('Pasien');
    }else{
      redirect('Lab/formedit');
    }
  }

  function get_data_petugas()
  {
    $list = $this->Model_Lab->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $field->id_petugas;
      $row[] = $field->nip;
      $row[] = $field->nama;
      $row[] = $field->jk;
      $row[] = $field->tmp_lahir;
      $row[] = $field->tgl_lahir;
      $row[] = $field->gol_drh;
      $row[] = $field->agama;

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Model_Lab->count_all(),
      "recordsFiltered" => $this->Model_Lab->count_filtered(),
      "data" => $data,
    );
        //output dalam format JSON
    echo json_encode($output);
  }

  function get_data_dokter()
  {
    $list = $this->Model_Lab->get_datatables1();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $field->id_dokter;
      $row[] = $field->kd_dokter;
      $row[] = $field->nm_dokter;
      $row[] = $field->jk;
      $row[] = $field->tmp_lahir;
      $row[] = $field->tgl_lahir;
      $row[] = $field->gol_drh;
      $row[] = $field->agama;

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Model_Lab->count_all1(),
      "recordsFiltered" => $this->Model_Lab->count_filtered1(),
      "data" => $data,
    );
        //output dalam format JSON
    echo json_encode($output);
  }


  function get_data_pemeriksaan()
  {
    $list = $this->Model_Lab->get_datatables2();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $field) {
      $no++;
      $row = array();
      $row[] = $field->id_jenis_perawat;
      $row[] = $field->kode_periksa;
      $row[] = $field->nama_pemeriksaan;
      $row[] = $field->tarif;

      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Model_Lab->count_all2(),
      "recordsFiltered" => $this->Model_Lab->count_filtered2(),
      "data" => $data,
    );
        //output dalam format JSON
    echo json_encode($output);
  }


}

/* End of file Lab.php */
/* Location: ./application/controllers/Lab.php */