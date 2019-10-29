
<h1>Data Pasien</h1>
<table border='1' cellpadding='8'>
    <thead>
        <tr>
            <th>ID Jenis Perawat</th>
            <th>Kode Periksa</th>
            <th>Nama Pemeriksaan</th>
            <th>Tarif</th>
        </tr>
    </thead>
    <?php if( ! empty($list)){
      foreach($list->result() as $data){
        echo "<tr>";
        echo "<td>".$data->id_jenis_perawat."</td>";
        echo "<td>".$data->kode_periksa."</td>";
        echo "<td>".$data->nama_pemeriksaan."</td>";
        echo "<td>".$data->tarif."</td>";
        echo "</tr>";
    }
}else{
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>