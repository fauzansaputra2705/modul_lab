<?php echo form_open('Lab/edit_lab'); ?>
<div class="card card-primary">
  <div class="card-body">

    <input type="hidden" name="id_cetak_lab" value="<?php echo $lab['id_cetak_lab']; ?>" placeholder="">
    <input type="hidden" value="<?php echo $lab['no_rkm_medis']; ?>" name="no_rkm_medis">
    <input type="hidden" value="<?php echo $lab['nm_pasien']; ?>" name="nm_pasien">
    <input type="hidden" class="form-control" value="<?php echo $lab['jk_umur'] ?>" name="jk_umur">

    <input type="hidden" value="<?php echo $lab['alamat']; ?>" name="alamat">

    <!-- <?php $tgl=date('Y/m/d');?> -->
    <!-- <input type="hidden" class="form-control" name="no_periksa" value="<?php echo $tgl.'/000'.$pasien['id_pasien']; ?>"> -->
    <input type="hidden" class="form-control" name="no_periksa" value="<?php echo $lab['no_periksa']; ?>">

    <div class="form-group">
      <label>Petugas Laboratorium</label>
      <input type="text" id="petugas_lab" name="petugas_lab" class="form-control" data-toggle="modal" data-target="#carip" value="<?php echo $lab['petugas_lab']; ?>" readonly>
    </div>

    <div class="form-group">
      <label>Dokter Penanggung Jawab</label>
      <input type="text" id="penaggung_jwb" name="penggung_jwb" class="form-control" data-toggle="modal" data-target="#caripj" readonly value="<?php echo $lab['penggung_jwb']; ?>">
    </div>

    <input type="hidden" id="dokter_pengirim" name="dokter_pengirim" value="<?php echo $lab['dokter_pengirim']; ?>">

    <!-- <?php $tgl=date('Y-m-d'); ?> -->
    <!-- <input type="hidden" name="tgl_pemeriksaan" value="<?php echo $tgl; ?>" placeholder=""> -->
    <input type="hidden" name="tgl_pemeriksaan" value="<?php echo $lab['tgl_pemeriksaan']; ?>" placeholder="">

    <!-- <?php $jam=date('h:i:s'); ?> -->
    <input type="hidden" name="jam_pemeriksaan" value="<?php echo $lab['jam_pemeriksaan']; ?>" placeholder="">

    <!-- <input type="hidden" name="poli" value="<?php echo "poliklinik ".$pasien['diagnosa_awal']; ?>" placeholder=""> -->
    <input type="hidden" name="poli" value="<?php echo $lab['poli']; ?>" placeholder="">

    <div class="form-group">
      <label>Pemeriksaan</label>
      <table id="table3" class="display" style= "width:100%; height:30%;">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Pemeriksaan</th>
            <th>Nama Pemeriksaan</th>
            <th>Tarif</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
          <th>No</th>
          <th>Kode Pemeriksaan</th>
          <th>Nama Pemeriksaan</th>
          <th>Tarif</th>
        </tfoot>

      </table>
      <input type="button" id="btncheck" class="btn btn-primary" value="Pilih">
    </div>


    <div class="form-group">
      <label>Input</label>
      <table id="table4" class="display" style= "width:100%; height:30%;">
        <thead>
          <tr>
            <th>Pemerikasaan</th>
            <th>Hasil</th>
            <th>Satuan</th>
            <th>Nilai Rujukan</th>
            <th>Keterangan</th>
            <th>Biaya</th>
          </tr>
        </thead>
        <tbody>
          <?php $c=explode('.', $lab['jenis_pemeriksaan']); $b=count($c);?>
          <?php for($a= 0; $a<$b; $a++){ ?>
            <tr>
              <td><input name='jenis_pemeriksaan[]' readonly class="form-control" value='<?php $pemeriksaan = explode('.',$lab['jenis_pemeriksaan']); echo $pemeriksaan[$a]; ?>'>
              </td> 
              <td><input type='text' name='hasil[]' class="form-control" value='<?php $hasil = explode('.',$lab['hasil']); echo $hasil[$a]; ?>'>
              </td>
              <td><input type='text' name='satuan[]' class="form-control" value='<?php $satuan = explode('.', $lab['satuan']); echo $satuan[$a]; ?>'>
              </td>
              <td><input type='text' name='nilai_rujukan[]' class="form-control" value='<?php $rujukan = explode('.', $lab['nilai_rujukan']); echo $rujukan[$a] ?>'>
              </td>
              <td><input type='text' name='keterangan[]' class="form-control" value='<?php $keterangan = explode('.', $lab['keterangan']); echo $keterangan[$a]; ?>'>
              </td>
              <td><input type='text' name='biaya[]' readonly class="form-control" value='<?php $biaya = explode('.',$lab['biaya']); echo $biaya[$a]; ?>'>
              </td>
              <!-- <td><input type="button" class='btn btn-primary'  value="&times"> -->
              </td>
              
            </tr>

          <?php } ?>
        </tbody>
        <tfoot>
        </tfoot>
      </table>

      <textarea name="catatan" hidden="hidden"><b>Catatan :</b><br>Jika ada keragu-raguan pemeriksaan, diharapkan segera menghubungi laboratorium.</textarea>

      <!-- <?php $tgl=date('Y-m-d'); ?> -->
      <!-- <?php $jam=date('h:i:s'); ?> -->
      <input type="hidden" name="tanggal_cetak" value="<?php echo $lab['tanggal_cetak']; ?>" placeholder="">

    </div>
    <script type="text/javascript">
      $(document).ready(function() {
          //datatables
          var table3 = $('#table3').DataTable({ 
            scrollY: 200,
            // scrollX:        true,
            scrollCollapse: true,
            "processing": true, 
            "serverSide": true,
            "paging": false,
            "order": [],

            "ajax": 
            {
              "url": "<?php echo site_url('Lab/get_data_pemeriksaan')?>",
              "type": "POST"
            },
            "columnDefs": 
            [
            { 
              "targets": [ 0 ],
              "orderable": false,
              className : "select-checkbox",
            },
            ],
            select:{
              style : 'multi',
              // style:    'os',
              // selector: 'td:first-child',
            },
            order: [[ 1, 'asc' ]],
          });

          $('#btncheck').click( function () {
            for (var i = 0; i < table3.rows('.selected').data().length; i++) { 

              var p = table3.rows('.selected').data()[i][2];
              var b = table3.rows('.selected').data()[i][3];

              $("#table4 tbody").append("<tr><td><input name='jenis_pemeriksaan[]' readonly class='form-control' value='"+p+"'></td> <td><input type='text' name='hasil[]' class='form-control' value=''></td><td><input type='text' name='satuan[]' class='form-control' value=''></td><td><input type='text' name='nilai_rujukan[]' class='form-control' value=''></td><td><input type='text' name='keterangan[]' class='form-control' value=''></td><td><input type='text' name='biaya[]' value='"+b+"' readonly class='form-control' placeholder=''></td><td><input type='button' class='btn btn-primary' id='delete"+i+"' value='&times'></td></tr>");
            $('#delete'+i).on('click', function () {
              $(this).parents('tr').fadeOut();
            } );
            }

          });
        })

      </script>

    </div>
    <!-- <div class="form-group">
      <label>Tarif</label>
      <input type="text" class="form-control" name="tarif">
    </div> -->
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan</button>
    </div>
  </div>
</div>
<?php echo form_close(); ?>