
<h1>Data Pasien</h1>
<table border='1' cellpadding='8'>
    <thead>
        <tr>
            <th>ID Pasien</th>
            <th>Nomor Rawat</th>
            <th>Nomor Rekam Medis</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>Penanggung Jawab</th>
            <th>Hubungan Penanggung Jawab</th>
            <th>Jenis Bayar</th>
            <th>Kamar</th>
            <th>Tarif Kamar</th>
            <th>Diagnosa Awal</th>
        </tr>
    </thead>
    <?php if( ! empty($list)){
      foreach($list->result() as $data){
        echo "<tr>";
        echo "<td>".$data->id_pasien."</td>";
        echo "<td>".$data->no_rawat."</td>";
        echo "<td>".$data->no_rkm_medis."</td>";
        echo "<td>".$data->nm_pasien."</td>";
        echo "<td>".$data->alamat."</td>";
        echo "<td>".$data->penaggung_jwb."</td>";
        echo "<td>".$data->hbng_pj."</td>";
        echo "<td>".$data->jenis_bayar."</td>";
        echo "<td>".$data->kamar."</td>";
        echo "<td>".$data->trf_kmr."</td>";
        echo "<td>".$data->diagnosa_awal."</td>";
        echo "</tr>";
    }
}else{
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>