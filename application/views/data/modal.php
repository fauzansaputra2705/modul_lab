<?php foreach($list_pasien->result() as $row){ ?>
  <!-- Modal -->
  <div class="modal fade" id="modalcetak<?php echo $row->id_pasien; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Input Tindakan ID <?php echo $row->id_pasien; ?> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link btn btn-primary btn-lg <?php foreach($list_lab->result() as $rowlab){ if ($row->id_pasien == $rowlab->id_cetak_lab) { ?>disabled"  aria-disabled="true"
              <?php }} ?> role="button" href= "<?php echo site_url("Lab/index/$row->id_pasien")?>">Periksa Lab</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary btn-lg" role="button" target="_blank" href="<?php echo site_url("Lab/cetak/$row->id_pasien");?>">Cetak Hasil Lab</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary btn-lg" role="button" href="<?php echo site_url("Lab/form_edit/$row->id_pasien") ?>">Edit Periksa Lab</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
<?php } ?>







<!-- Modal -->
<div class="modal fade" id="carip" tabindex="-1" role="dialog" aria-labelledby="petugastitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="petugastitle">Pilih Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="table1" class="display" style="width:100%">
          <thead>
            <tr>
              <th>ID Petugas</th>
              <th>NIP</th>
              <th>Nama Petugas</th>
              <th>Jenis Kelamin</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Gol Darah</th>
              <th>Agama</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <!-- <tr>
              <th>ID Petugas</th>
              <th>NIP</th>
              <th>Nama Petugas</th>
              <th>Jenis Kelamin</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Gol Darah</th>
              <th>Agama</th>
            </tr> -->
          </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="savep">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
          //datatables
          var table1 = $('#table1').DataTable({ 
            // scrollY:        300,
            // scrollX:        true,
            // scrollCollapse: true,
            "processing": true, 
            "serverSide": true,
            "order": [], 

            "ajax": {
              "url": "<?php echo site_url('Lab/get_data_petugas')?>",
              "type": "POST"
            },
            "columnDefs": [
            { 
              "targets": [ 0 ], 
              "orderable": false, 
            },
            ],
          });
          $('#table1 tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
            }
            else {
              table1.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
            }
          } );

          $('#savep').click( function () {
            for (var i = 0; i < table1.rows('.selected').data().length; i++) { 

              var p = table1.rows('.selected').data()[i][2];
              document.getElementById('petugas_lab').value = p;
            }
            $('.modal').modal('hide');
          } );
        });
      </script>










<div class="modal fade" id="caripj" tabindex="-2" role="dialog" aria-labelledby="penanggungjawabtitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="penanggungjawabtitle">Pilih Dokter</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <table id="table2" class="display" style="width:100%">
        <thead>
          <tr>
            <th>ID Dokter</th>
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Golongan Darah</th>
            <th>Agama</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
          <!-- <tr>
            <th>ID Dokter</th>
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Golongan Darah</th>
            <th>Agama</th>
          </tr> -->
        </tfoot>
      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" id="savepj">Save changes</button>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
          //datatables
          var table2 = $('#table2').DataTable({ 
            // scrollY:        300,
            // scrollX:        true,
            // scrollCollapse: true,
            "processing": true, 
            "serverSide": true,
            "order": [],

            "ajax": {
              "url": "<?php echo site_url('Lab/get_data_dokter')?>",
              "type": "POST"
            },
            "columnDefs": [
            { 
              "targets": [ 0 ], 
              "orderable": false,
            },
            ],
          });
          $('#table2 tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
            }
            else {
              table2.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
            }
          } );

          $('#savepj').click( function () {
            for (var i = 0; i < table2.rows('.selected').data().length; i++) { 

              var d = table2.rows('.selected').data()[i][2];
              document.getElementById('penaggung_jwb').value = d;
              document.getElementById('dokter_pengirim').value = d;
            }
            $('.modal').modal('hide');
          } );
        } );
      </script>