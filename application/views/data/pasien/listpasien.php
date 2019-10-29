
<!-- <table class="table table-striped table-responsive" id="sortable-table"	style=""> -->
    <table id="table" class="table table-striped">
        <a href="<?php echo site_url("Pasien/form_tambah"); ?>" class="btn btn-primary">Tambah Pasien</a>
        <a href="<?php echo site_url("Pasien/export"); ?>" class="btn btn-success ml-1">Export ke Excel</a>
        
        <thead>
            <tr>
                <th>ID Pasien</th>
                <th>Nomor Rawat</th>
                <th>Nomor Rekam Medis</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Penanggung Jawab</th>
                <th>Hubungan Penanggung Jawab</th>
                <th>Jenis Bayar</th>
                <th>Kamar</th>
                <th>Tarif Kamar</th>
                <th>Diagnosa Awal</th>
                <th></th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
                    <!-- <tbody>
                        <?php
                        foreach ($list_pasien->result() as $row) {?>
                            <tr>
                                
                                <td>
                                    <?php echo $row->id_pasien; ?>
                                </td>
                                <td><?php echo $row->no_rawat; ?></td>
                                <td>
                                    <?php echo $row->no_rkm_medis; ?>
                                </td>
                                <td><?php echo $row->nm_pasien; ?></td>
                                <td><?php echo $row->jenis_kelamin; ?></td>
                                <td><?php echo $row->alamat; ?></td>
                                <td><?php echo $row->penaggung_jwb; ?></td>
                                <td><?php echo $row->hbng_pj; ?></td>
                                <td><?php echo $row->jenis_bayar; ?></td>
                                <td><?php echo $row->kamar; ?></td>
                                <td><?php echo $row->trf_kmr; ?></td>
                                <td><?php echo $row->diagnosa_awal; ?></td>
                                
                                <td><a href="<?php echo site_url("Pasien/hapus_data/$row->id_pasien"); ?>" class="btn btn-danger" onclick="return confirm('Ada Yakin Ingin Menghapus <?php echo $row->nm_pasien; ?>')">Hapus</a></td>
                                <td><a href="<?php echo site_url("Pasien/form_edit/$row->id_pasien"); ?>" class="btn btn-primary">Edit</a></td>
                                <td><button type="button" href="Pasien/index/$row->id_pasien" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Action
                                </button></td>
                            </tr>
                        <?php } ?>
                    </tbody> -->
                </table>
                <script type="text/javascript">
            var save_method; //for save method string
            var table;
            
            $(document).ready(function() {
                //datatables
                // $('#table').parent().addClass('table-responsive');
                table = $('#table').DataTable({
                    scrollY:        1000,
                    scrollX:        true,
                    scrollCollapse: true,
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
                    // "searching": false,
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo base_url('Pasien/json'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                    {"data": "id_pasien",width:100},
                    {"data": "no_rawat",width:150},
                    {"data": "no_rkm_medis",width:150},
                    {"data": "nm_pasien",width:300},
                    {"data": "jenis_kelamin",width:100},
                    {"data": "alamat",width:300},
                    {"data": "penaggung_jwb",width:150},
                    {"data": "hbng_pj",width:150},
                    {"data": "jenis_bayar",width:100},
                    {"data": "kamar",width:100},
                    {"data": "trf_kmr",width:100},
                    {"data": "diagnosa_awal",width:100},
                    {"data": "edit",width:50},
                    {"data": "hapus",width:50},
                    {"data": "cetak",width:50}
                    ],
                });
            });
        </script>
        
