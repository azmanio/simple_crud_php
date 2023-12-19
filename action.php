<?php
// error_reporting(0);
// panggil koneksi database
include "scripts/config.php";

// ====================================== FORM PELANGGAN ========================================
// ACTION SIMPAN
if (isset($_POST['simpanPelanggan'])) {
	if ($_POST[idPelanggan] == '' | $_POST[namaPelanggan] == '' | $_POST[alamatPelanggan] == '' | $_POST[jkPelanggan] == '' | $_POST[noHpPelanggan] == '' | $_POST[noKtpPelanggan] == '') {
		echo "<script>
			alert('Data Gagal Disimpan!');
			document.location='form_pelanggan.php';
			</script>";
	} else {
		$simpanPelanggan = mysqli_query($db,"INSERT INTO pelanggan (idPelanggan,namaPelanggan,alamatPelanggan,jkPelanggan,noHpPelanggan,noKtpPelanggan) VALUES(
			'$_POST[idPelanggan]',
			'$_POST[namaPelanggan]',
			'$_POST[alamatPelanggan]',
			'$_POST[jkPelanggan]',
			'$_POST[noHpPelanggan]',
			'$_POST[noKtpPelanggan]'
		)");
		if ($simpanPelanggan){
			echo "<script>
				alert('Data Berhasil Disimpan!');
				document.location='form_pelanggan.php';
			</script>";
		}else{
			echo "<script>
				alert('Data Gagal Disimpan!');
				document.location='form_pelanggan.php';
			</script>";	
		}
	}
}

// ACTION UPDATE
if (isset($_POST['ubahPelanggan'])) {
	if ($_POST[idPelanggan] == '' | $_POST[namaPelanggan] == '' | $_POST[alamatPelanggan] == '' | $_POST[jkPelanggan] == '' | $_POST[noHpPelanggan] == '' | $_POST[noKtpPelanggan] == '') {
		echo "<script>
			alert('Data Gagal Diubah!');
			document.location='form_pelanggan.php';
		</script>";
	}else{
		$ubahPelanggan= mysqli_query($db,"UPDATE pelanggan SET
			idPelanggan = '$_POST[idPelanggan]',
			namaPelanggan = '$_POST[namaPelanggan]',
			alamatPelanggan = '$_POST[alamatPelanggan]',
			jkPelanggan = '$_POST[jkPelanggan]',
			noHpPelanggan = '$_POST[noHpPelanggan]',
			noKtpPelanggan = '$_POST[noKtpPelanggan]'
			WHERE idPelanggan = '$_POST[idPelanggan]'");
		if ($ubahPelanggan){
			echo "<script>
				alert('Data Berhasil Diubah!');
				document.location='form_pelanggan.php';
			</script>";
		}else{
			echo "<script>
				alert('Data Gagal Diubah!');
				document.location='form_pelanggan.php';
			</script>";
		}
	}
}
        
// ACTION HAPUS
if (isset($_POST['hapusPelanggan'])) {
	$hapusPelanggan= mysqli_query($db,"DELETE FROM pelanggan WHERE idPelanggan='$_POST[idPelanggan]'");
	if ($hapusPelanggan){
		echo "<script>
			alert('Data Berhasil Dihapus!');
			document.location='form_pelanggan.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Gagal Dihapus!');
			document.location='form_pelanggan.php';
		</script>";	
	}
}


// ====================================== FORM MOBIL ========================================
// ACTION SIMPAN
if (isset($_POST['simpanMobil'])) {
	if ($_POST[idMobil] == '' | $_POST[platMobil] == '' | $_POST[merkMobil] == '' |	$_POST[warnaMobil] == '' | $_POST[tahunMobil] == '') {
		echo "<script>
			alert('Data Gagal Disimpan!');
			document.location='form_mobil.php';
		</script>";	
	}else{
		$simpanMobil = mysqli_query($db,"INSERT INTO jenisMobil (idMobil,platMobil,merkMobil,warnaMobil,tahunMobil) VALUES(
			'$_POST[idMobil]',
			'$_POST[platMobil]',
			'$_POST[merkMobil]',
			'$_POST[warnaMobil]',
			'$_POST[tahunMobil]'
		)");
		if ($simpanMobil){
			echo "<script>
				alert('Data Berhasil Disimpan!');
				document.location='form_mobil.php';
			</script>";
		}else{
			echo "<script>
				alert('Data Gagal Disimpan!');
				document.location='form_mobil.php';
			</script>";	
		}
	}
}

// ACTION UPDATE
if (isset($_POST['ubahMobil'])) {
	if ($_POST[idMobil] == '' | $_POST[platMobil] == '' | $_POST[merkMobil] == '' |	$_POST[warnaMobil] == '' | $_POST[tahunMobil] == ''){
		echo "<script>
			alert('Data Gagal Diubah!');
			document.location='form_mobil.php';
		</script>";	
	}else{
		$ubahMobil= mysqli_query($db,"UPDATE jenisMobil SET
			idMobil = '$_POST[idMobil]',
			platMobil = '$_POST[platMobil]',
			merkMobil = '$_POST[merkMobil]',
			warnaMobil = '$_POST[warnaMobil]',
			tahunMobil = '$_POST[tahunMobil]'
			WHERE idMobil = '$_POST[idMobil]'
		");
		if ($ubahMobil){
			echo "<script>
				alert('Data Berhasil Diubah!');
				document.location='form_mobil.php';
			</script>";
		}else{
			echo "<script>
				alert('Data Gagal Diubah!');
				document.location='form_mobil.php';
			</script>";
		}
	}
}
        
// ACTION HAPUS
if (isset($_POST['hapusMobil'])) {
	$hapusMobil= mysqli_query($db,"DELETE FROM jenisMobil WHERE idMobil='$_POST[idMobil]'");
	if ($hapusMobil){
		echo "<script>
			alert('Data Berhasil Dihapus!');
			document.location='form_mobil.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Gagal Dihapus!');
			document.location='form_mobil.php';
		</script>";	
	}
}


// ====================================== FORM TARIF ========================================
// ACTION SIMPAN
if (isset($_POST['simpanTarif'])) {
	if ($_POST[idTarif] == '' | $_POST[waktuSewa] == '' | $_POST[tarifPerHari] == '' |	$_POST[totalTarif] == '') {
		echo "<script>
			alert('Data Gagal Disimpan!');
			document.location='form_tarif.php';
		</script>";	
	}else{
		$simpanTarif = mysqli_query($db,"INSERT INTO tarif (idTarif,waktuSewa,tarifPerHari,totalTarif) VALUES(
			'$_POST[idTarif]',
			'$_POST[waktuSewa]',
			'$_POST[tarifPerHari]',
			'$_POST[totalTarif]'
		)");
		if ($simpanTarif){
			echo "<script>
				alert('Data Berhasil Disimpan!');
				document.location='form_tarif.php';
			</script>";
		}else{
			echo "<script>
				alert('Data Gagal Disimpan!');
				document.location='form_tarif.php';
			</script>";	
		}
	}
}

// ACTION UPDATE
if (isset($_POST['ubahTarif'])) {
	if ($_POST[idTarif] == '' | $_POST[waktuSewa] == '' | $_POST[tarifPerHari] == '' |	$_POST[totalTarif] == '') {
		echo "<script>
			alert('Data Gagal Diubah!');
			document.location='form_tarif.php';
		</script>";	
	}else{
		$ubahTarif= mysqli_query($db,"UPDATE tarif SET
			idTarif = '$_POST[idTarif]',
			waktuSewa = '$_POST[waktuSewa]',
			tarifPerHari = '$_POST[tarifPerHari]',
			totalTarif = '$_POST[totalTarif]'
			WHERE idTarif = '$_POST[idTarif]'
		");
		if ($ubahTarif){
			echo "<script>
				alert('Data Berhasil Diubah!');
				document.location='form_tarif.php';
			</script>";
		}else{
			echo "<script>
				alert('Data Gagal Diubah!');
				document.location='form_tarif.php';
			</script>";
		}
	}
}
        
// ACTION HAPUS
if (isset($_POST['hapusTarif'])) {
	$hapusTarif= mysqli_query($db,"DELETE FROM tarif WHERE idTarif='$_POST[idTarif]'");
	if ($hapusTarif){
		echo "<script>
			alert('Data Berhasil Dihapus!');
			document.location='form_tarif.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Gagal Dihapus!');
			document.location='form_tarif.php';
		</script>";	
	}
}


// ====================================== FORM TRANSAKSI ========================================
// ACTION SIMPAN
if (isset($_POST['simpanTransaksi'])) {
	if ($_POST[idTransaksi] == '' | $_POST[idPelanggan] == '' | $_POST[idMobil] == '' |	$_POST[tglSewa] == '' | $_POST[tglKembali] == '' | $_POST[idTarif] == '' | $_POST[totalTarif] == '' | $_POST[keterangan] == '') {
		echo "<script>
			alert('Data Gagal Disimpan!');
			document.location='form_transaksi.php';
		</script>";	
	}else{
		$simpanTransaksi = mysqli_query($db,"INSERT INTO transaksi (idTransaksi,idPelanggan,idMobil,tglSewa,tglKembali,idTarif,totalTarif,keterangan) VALUES(
			'$_POST[idTransaksi]',
			'$_POST[idPelanggan]',
			'$_POST[idMobil]',
			'$_POST[tglSewa]',
			'$_POST[tglKembali]',
			'$_POST[idTarif]',
			'$_POST[totalTarif]',
			'$_POST[keterangan]'
		)");
		if ($simpanTransaksi){
			echo "<script>
				alert('Data Berhasil Disimpan!');
				document.location='form_transaksi.php';
			</script>";
		}else{
			echo "<script>
				alert('Data Gagal Disimpan!');
				document.location='form_transaksi.php';
			</script>";	
		}
	}
}

// ACTION UPDATE
if (isset($_POST['ubahTransaksi'])) {
	$ubahTransaksi= mysqli_query($db,"UPDATE transaksi SET
		idTransaksi = '$_POST[idTransaksi]',
		idPelanggan = '$_POST[idPelanggan]',
		idMobil = '$_POST[idMobil]',
		tglSewa = '$_POST[tglSewa]',
		tglKembali = '$_POST[tglKembali]',
		idTarif = '$_POST[idTarif]',
		totalTarif = '$_POST[totalTarif]',
		keterangan = '$_POST[keterangan]'
		WHERE idTransaksi = '$_POST[idTransaksi]'
	");
	if ($ubahTransaksi){
		echo "<script>
			alert('Data Berhasil Diubah!');
			document.location='form_transaksi.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Gagal Diubah!');
			document.location='form_transaksi.php';
		</script>";
		
	}
}
        
// ACTION HAPUS
if (isset($_POST['hapusTransaksi'])) {
	$hapusTransaksi= mysqli_query($db,"DELETE FROM transaksi WHERE idTransaksi='$_POST[idTransaksi]'");
	if ($hapusTransaksi){
		echo "<script>
			alert('Data Berhasil Dihapus!');
			document.location='form_transaksi.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Gagal Dihapus!');
			document.location='form_transaksi.php';
		</script>";	
	}
}

?>