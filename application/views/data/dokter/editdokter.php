<?php echo form_open('Dokter/edit_data'); ?>
<div class="card card-primary">
  <div class="card-body">
    <div class="form-group">
      <label>Kode Dokter</label>
      <input type="hidden" name="id_dokter" value="<?php echo $dokter['id_dokter'] ?>">
      <input type="text" class="form-control" name="kd_dokter" value="<?php echo $dokter['kd_dokter'] ?>">
    </div>
    <div class="form-group">
      <label>Nama Dokter</label>
      <input type="text" class="form-control" name="nm_dokter" value="<?php echo $dokter['nm_dokter'] ?>">
    </div>

    <div class="form-group">
      <label>Jenis Kelamin</label>
      <br>
      <label for="">Laki Laki</label>
      <input type="radio" class="" name="jk" value="L">
      <label for="" class="ml-5">Perempuan</label>
      <input type="radio" class="" name="jk" value="P">
    </div>

    <div class="form-group">
      <label>Tempat Lahir</label>
      <input type="text" class="form-control" name="tmp_lahir" value="<?php echo $dokter['tmp_lahir'] ?>">
    </div>
    <div class="form-group">
      <label>Tanggal Lahir</label>
      <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $dokter['tgl_lahir'] ?>">
    </div>
    <div class="form-group">
      <label>Golongan Darah</label>
      <select name="gol_drh" id="" class="form-control" value="">
        <option value="<?php echo $dokter['gol_drh'] ?>"><?php echo $dokter['gol_drh'] ?></option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="AB">AB</option>
        <option value="O">O</option>
      </select>
    </div>
    <div class="form-group">
      <label>Agama</label>
      <input type="text" class="form-control" name="agama" value="<?php echo $dokter['agama'] ?>">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>