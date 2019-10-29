<style>
	/**{
		border:1px solid black;
	}*/
</style>

<div>
	<table >
		<tr>
			<td>
				<img src="<?php base_url() ?>assets/img/rpl.jpg" alt="" width="100px">
			</td>
			<td></td>
			<td></td>
			<td></td>
			<td colspan="3">
				<h3>Laboratorium</h3>
				<h2>REKAYASA PERANGKAT LUNAK</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eos minus fugiat odit unde nam, ullam eveniet itaque illum alias et doloremque, deleniti molestias optio aliquid saepe, numquam corporis debitis!</p>
			</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="15">
				<hr size="4px" color="">
			</td>	
		</tr>
		<tr>
			<td colspan="15" align="center">
				<h3>HASIL PEMERIKSAAN LABORATORIUM</h3>
			</td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td colspan="3">No.RM</td>
			<td>:</td>
			<td><?php echo $lab['no_rkm_medis'] ?></td>
			<td>Penanggung Jawab</td>
			<td>:</td>
			<td colspan="8"><?php echo $lab['penggung_jwb'] ?></td>
		</tr>
		<tr>
			<td colspan="3">Nama Pasien</td>
			<td>:</td>
			<td><?php echo $lab['nm_pasien'] ?></td>
			<td>Dokter Pengirim</td>
			<td>:</td>
			<td colspan="8"><?php echo $lab['dokter_pengirim'] ?></td>
		</tr>
		<tr>
			<td colspan="3">JK/Umur</td>
			<td>:</td>
			<td><?php echo $lab['jk_umur'] ?></td>
			<td>Tanggal Pemeriksaan</td>
			<td>:</td>
			<td colspan="8"><?php echo $lab['tgl_pemeriksaan'] ?></td>
		</tr>
		<tr>
			<td colspan="3">Alamat</td>
			<td>:</td>
			<td><?php echo $lab['alamat'] ?></td>
			<td>Jam Pemeriksaan</td>
			<td>:</td>
			<td colspan="8"><?php echo $lab['jam_pemeriksaan'] ?></td>
		</tr>
		<tr>
			<td colspan="3">No.Periksa</td>
			<td>:</td>
			<td><?php echo $lab['no_periksa'] ?></td>
			<td>Poli</td>
			<td>:</td>
			<td colspan="8"><?php echo $lab['poli'] ?></td>
		</tr>
	</table>
	<table border="1" width="100%" cellspacing="0" style="margin-top: 20px;" align="center" cellpadding="5">
		<thead>
			<tr bgcolor="royalblue">
				<th>Pemeriksaan</th>
				<th>Hasil</th>
				<th>Satuan</th>
				<th>Nilai Rujukan</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<?php $c=explode('.', $lab['jenis_pemeriksaan']); $b=count($c);?>
		<?php for($a= 0; $a<$b; $a++){ ?>
			<tr>
				<td><?php $pemeriksaan = explode('.',$lab['jenis_pemeriksaan']); echo $pemeriksaan[$a]; ?>
			</td> 
			<td><?php $hasil = explode('.',$lab['hasil']); echo $hasil[$a]; ?>
		</td>
		<td><?php $satuan = explode('.', $lab['satuan']); echo $satuan[$a]; ?>
	</td>
	<td><?php $rujukan = explode('.', $lab['nilai_rujukan']); echo $rujukan[$a] ?>
</td>
<td><?php $keterangan = explode('.', $lab['keterangan']); echo $keterangan[$a]; ?>
</td>

</tr>

<?php } ?>
</table>
<table style="margin-top: 10px;" width="100%">
	<tr>
		<td colspan="12"></td>
		<td colspan="3"><p>Tgl.Cetak : <?php echo $lab['tanggal_cetak']; ?></p></td>
	</tr>
	<tr>
		<td colspan="12"></td>
		<td colspan="3"><p>Petugas Laboratorium</p></td>
	</tr>
	<tr>
		<td colspan="12"><br></td>
		<td colspan="3"><br></td>
	</tr>
	<tr>
		<td colspan="12"><br></td>
		<td colspan="3"><br></td>
	</tr>
	<tr>
		<td colspan="12"><br></td>
		<td colspan="3"><br></td>
	</tr>
	<tr>
		<td colspan="12"><?php echo $lab['catatan']; ?></td>
		<td colspan="3"><?php echo $lab['petugas_lab']; ?></td>
	</tr>
</table>
</div>