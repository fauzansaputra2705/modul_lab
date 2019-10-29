<?php echo form_open('Jns_Pemeriksaan/tambah_data'); ?>
<div class="card card-primary">
  <div class="card-body">
    <div class="form-group">
      <label>Kode Periksa</label>
      <input type="text" class="form-control" name="kode_periksa">
    </div>
    <div class="form-group">
      <label>Nama Nama Pemeriksaan</label>
      <input type="text" class="form-control" name="nama_pemeriksaan">
    </div>
    <div class="form-group">
      <label>Tarif</label>
      <input type="text" class="form-control" name="tarif">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>