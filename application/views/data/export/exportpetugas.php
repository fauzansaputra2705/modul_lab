<h1>Data Petugas</h1>
<table border='1' cellpadding='8'>
    <thead>
        <tr>
            <th>ID Petugas</th>
            <th>Kode Petugas</th>
            <th>Nama Petugas</th>
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
        echo "<td>".$data->id_petugas."</td>";
        echo "<td>".$data->nip."</td>";
        echo "<td>".$data->nama."</td>";
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