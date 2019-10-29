<?php echo form_open('Pasien/tambah_data'); ?>
<div class="card card-primary">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-6">
        <label>No Rawat</label>
        <input type="text" class="form-control" name="no_rawat">
      </div>
      <div class="form-group col-6">
        <label>No Rekam Medis</label>
        <input type="text" class="form-control" name="no_rkm_medis">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label>Nama Pasien</label>
        <input type="text" class="form-control" name="nm_pasien">

        <div class="form-check form-check-inline mt-5">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki Laki">
        <label class="form-check-label" for="jenis_kelamin">Laki Laki</label>
      </div>
      <div class="form-check form-check-inline mt-5">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
        <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
      </div>

      </div>
      <div class="form-group col-6">
        <label>Alamat</label>
        <textarea name="alamat" id="" style="height: 130px;" cols="30" rows="30" class="form-control"></textarea>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label>Penanggung Jawab</label>
        <input type="text" class="form-control" name="penaggung_jwb">
      </div>
      <div class="form-group col-6">
        <label>Hubungan Penanggung Jawab</label>
        <input type="text" class="form-control" name="hbng_pj">
      </div>
    </div>


    <div class="row">
      <div class="form-group col-6">
        <label>Jenis Bayar</label>
        <input type="text" class="form-control" name="jenis_bayar">
      </div>
      <div class="form-group col-6">
        <label>Kamar</label>
        <input type="text" class="form-control" name="kamar">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label>Tarif Kamar</label>
        <input type="text" class="form-control" name="trf_kmr">
      </div>
      <div class="form-group col-6">
        <label>Diagnosa Awal</label>
        <input type="text" class="form-control" name="diagnosa_awal">
      </div>
    </div>	

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>