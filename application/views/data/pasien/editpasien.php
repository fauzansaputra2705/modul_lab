<?php echo form_open('Pasien/edit_data'); ?>
<div class="card card-primary">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-6">
        <input type="hidden" name="id_pasien" value="<?= $pasien['id_pasien'] ?>">
        <label>No Rawat</label>
        <input type="text" class="form-control" name="no_rawat" value="<?php echo $pasien['no_rawat'] ?>">
      </div>
      <div class="form-group col-6">
        <label>No Rekam Medis</label>
        <input type="text" class="form-control" name="no_rkm_medis" value="<?php echo $pasien['no_rkm_medis'] ?>">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label>Nama Pasien</label>
        <input type="text" class="form-control" name="nm_pasien" value="<?php echo $pasien['nm_pasien'] ?>">

      
        <div class="form-check form-check-inline mt-5">
        <input class="form-check-input" type="radio" <?php if ($pasien['jenis_kelamin'] == "Laki Laki"){ ?> checked="checked" <?php } ?> id="jenis_kelamin" value="Laki Laki" name="jenis_kelamin">
        <label class="form-check-label" for="jenis_kelamin">Laki Laki</label>
      </div>
      
      <div class="form-check form-check-inline mt-5">
        <input class="form-check-input" type="radio" <?php if ($pasien['jenis_kelamin'] == "Perempuan"){ ?> checked="checked" <?php } ?> id="jenis_kelamin" value="Perempuan" name="jenis_kelamin">
        <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
      </div>

      
      </div>
      <div class="form-group col-6">
        <label>Alamat</label>
        <textarea name="alamat" id="" style="height: 130px;" cols="30" rows="30" class="form-control" value=""><?php echo $pasien['alamat'] ?></textarea>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label>Penanggung Jawab</label>
        <input type="text" class="form-control" name="penaggung_jwb" value="<?php echo $pasien['penaggung_jwb'] ?>">
      </div>
      <div class="form-group col-6">
        <label>Hubungan Penanggung Jawab</label>
        <input type="text" class="form-control" name="hbng_pj" value="<?php echo $pasien['hbng_pj'] ?>">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label>Jenis Bayar</label>
        <input type="text" class="form-control" name="jenis_bayar" value="<?php echo $pasien['jenis_bayar'] ?>">
      </div>
      <div class="form-group col-6">
        <label>Kamar</label>
        <input type="text" class="form-control" name="kamar" value="<?php echo $pasien['kamar'] ?>">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label>Tarif Kamar</label>
        <input type="text" class="form-control" name="trf_kmr" value="<?php echo $pasien['trf_kmr'] ?>">
      </div>
      <div class="form-group col-6">
        <label>Diagnosa Awal</label>
        <input type="text" class="form-control" name="diagnosa_awal" value="<?php echo $pasien['diagnosa_awal'] ?>">
      </div>
    </div>	

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>