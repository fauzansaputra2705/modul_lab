
<table class="table table-striped table-responsive" id="table"	style="">
  <a href="<?php echo site_url("Petugas/form_tambah"); ?>" class="btn btn-success">Tambah Petugas</a>
  <a href="<?php echo site_url("Petugas/export"); ?>" class="btn btn-primary ml-1">Export ke Excel</a>
  
  <thead>
    <tr>
        <th>ID Petugas</th>
        <th>NIP</th>
        <th>Nama Petugas</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Golongan Darah</th>
        <th>Agama</th>
        <th>Action</th>
        <th></th>
    </tr>
</thead>
<tbody>
                        <!-- <?php
                        foreach ($list->result() as $row) {?>
                            <tr>
                            	
                                <td>
                                    <?php echo $row->id_petugas; ?>
                                </td>
                                <td><?php echo $row->nip; ?></td>
                                <td>
                                    <?php echo $row->nama; ?>
                                </td>
                                <td><?php echo $row->jk; ?></td>
                                <td><?php echo $row->tmp_lahir; ?></td>
                                <td><?php echo $row->tgl_lahir; ?></td>
                                <td><?php echo $row->gol_drh; ?></td>
                                <td><?php echo $row->agama; ?></td>
                                
                                <td><a href="<?php echo site_url("Petugas/hapus_data/$row->id_petugas"); ?>" class="btn btn-danger" onclick="return confirm('Ada Yakin Ingin Menghapus <?php echo $row->nama; ?>')">Hapus</a></td>
                                <td><a href="<?php echo site_url("Petugas/form_edit/$row->id_petugas"); ?>" class="btn btn-primary">Edit</a></td>
                            </tr>
                            <?php } ?> -->
                        </tbody>
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
                        "url": '<?php echo base_url('index.php/petugas/json'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                    {"data": "id_petugas",width:50},
                    {"data": "nip",width:100},
                    {"data": "nama",width:100},
                    {"data": "jk",width:100},
                    {"data": "tmp_lahir",width:150},
                    {"data": "tgl_lahir",width:100},
                    {"data": "gol_drh",width:100},
                    {"data": "agama",width:100},
                    {"data": "edit",width:100},
                    {"data": "hapus",width:100}
                    ],
                });
            });
        </script>