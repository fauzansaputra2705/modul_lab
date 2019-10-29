
<!-- <table class="table table-striped table-responsive" id="sortable-table"	style=""> -->
    <table id="table" class="table table-striped">
        <a href="<?php echo site_url("Jns_Pemeriksaan/form_tambah"); ?>" class="btn btn-primary">Tambah Pemeriksaan</a>
        <a href="<?php echo site_url("Jns_Pemeriksaan/export"); ?>" class="btn btn-success ml-1">Export ke Excel</a>

        <thead>
            <tr>
                <th>ID Jenis Perawat</th>
                <th>Kode Periksa</th>
                <th>Nama Pemeriksaan</th>
                <th>Tarif</th>
            </thead>
                    <!-- <tbody>
                        <?php
                        foreach ($list->result() as $row) {?>
                            <tr>
                                
                                <td>
                                    <?php echo $row->id_jenis_perawat; ?>
                                </td>
                                <td><?php echo $row->kode_periksa; ?></td>
                                <td>
                                    <?php echo $row->nama_pemeriksaan; ?>
                                </td>
                                <td><?php echo $row->tarif; ?></td>
                                
                                <td><a href="<?php echo site_url("Jns_Pemeriksaan/hapus_data/$row->id_jenis_perawat"); ?>" class="btn btn-danger" onclick="return confirm('Ada Yakin Ingin Menghapus <?php echo $row->nm_Jns_Pemeriksaan; ?>')">Hapus</a></td>
                                <td><a href="<?php echo site_url("Jns_Pemeriksaan/form_edit/$row->id_jenis_perawat"); ?>" class="btn btn-primary">Edit</a></td>
                                <td><button type="button" href="Jns_Pemeriksaan/index/$row->id_jenis_perawat" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Action
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
                $('#table').parent().addClass('table-responsive');
                table = $('#table').DataTable({
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
                    // "searching": false,
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo base_url('Jns_Pemeriksaan/json'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                    {"data": "id_jenis_perawat",width:150},
                    {"data": "kode_periksa",width:300},
                    {"data": "nama_pemeriksaan",width:300},
                    {"data": "tarif",width:300}
                    ],
                });
            });
        </script>
        
