<h1>Data Dokter</h1>
<table border='1' cellpadding='8'>
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
    <?php if( ! empty($list)){
      foreach($list->result() as $data){
        echo "<tr>";
        echo "<td>".$data->id_dokter."</td>";
        echo "<td>".$data->kd_dokter."</td>";
        echo "<td>".$data->nm_dokter."</td>";
        echo "<td>".$data->jk."</td>";
        echo "<td>".$data->tmp_lahir."</td>";
        echo "<td>".$data->tgl_lahir."</td>";
        echo "<td>".$data->gol_drh."</td>";
        echo "<td>".$data->agama."</td>";
        echo "</tr>";
    }
}else{
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}?>
</table>