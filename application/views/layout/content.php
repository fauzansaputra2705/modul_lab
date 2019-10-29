
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo $title; ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">Laboratorium</div>
        <div class="breadcrumb-item"><?php echo $title; ?></div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <?php 
          if ($page == "Pasien") {
            $this->load->view('data/pasien/listpasien');
          }elseif ($page == "FormTambahPasien") {
            $this->load->view('data/pasien/tambahpasien');
          }elseif ($page == "FormEditPasien") {
            $this->load->view('data/pasien/editpasien');
          }elseif ($page == "Dokter") {
            $this->load->view('data/dokter/listdokter');
          }elseif ($page == "FormTambahDokter") {
            $this->load->view('data/dokter/tambahdokter');
          }elseif ($page == "FormEditDokter") {
            $this->load->view('data/dokter/editdokter');
          }elseif ($page == "Petugas") {
            $this->load->view('data/petugas/listpetugas');
          }elseif ($page == "FormTambahPetugas") {
            $this->load->view('data/petugas/tambahpetugas');
          }elseif ($page == "FormEditPetugas") {
            $this->load->view('data/petugas/editpetugas');
          }elseif ($page == "Lab") {
            $this->load->view('data/lab/periksalab');
          }elseif ($page == "EditLab") {
            $this->load->view('data/lab/editlab');
          }elseif($page == "Pemeriksaan"){
            $this->load->view('data/jenis_perawatan/list_perawatan');
          }elseif($page == "FormTambahPemeriksaan"){
            $this->load->view('data/jenis_perawatan/tambah_perawatan');
          }
          ?>
        </div>
              <!-- <div class="card-footer bg-whitesmoke">
                This is card footer
              </div> -->
            </div>
          </div>
        </section>
      </div>