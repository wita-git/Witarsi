<!DOCTYPE html>
<html>
<?php
$koneksi = new mysqli ("localhost","root","","travel");
if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM tiket WHERE idtiket='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<head>
	<title>APLIKASI TRAVELME</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
		<div class="col-lg-8">
			<div class="page-header">
				<br>
				<br>
				<h2>UBAH DATA PEMESANAN</h2>
			</div>
			<br>
			<form method="POST" enctype="multipart/form-data">

            <div class="form-group">
					<label>KODE TIKET</label>
					<input type="text" name="kodetiket" class="form-control" required>
				</div>

				<div class="form-group">
					<label>NAMA PEMBELI</label>
					<input type="text" name="namapembeli" class="form-control" required>
				</div>

				<div class="form-group">
					<label>TANGGAL BERANGKAT</label>
					<input type="date" name="tglberangkat" class="form-control" required>
				</div>

                <div class="form-group">
					<label>PENJEMPUTAN</label>
					<input type="text" name="penjemputan" class="form-control" required>
				</div>

                <div class="form-group">
					<label>TUJUAN</label>
					<input type="text" name="tujuan" class="form-control" required>
				</div>

                <div class="form-group">
					<label>HARGA</label>
					<input type="text" name="harga" class="form-control" required>
				</div>
				<br>

				<div class="form-group">
					<input type="submit" name="Simpan" value="Ubah Data" class="btn btn-primary">
					<a href="index.php" class="btn btn-warning">Batal</a>
				</div>
			</form>
		</div>
	</div>

</body>

<?php	
    if (isset ($_POST['Simpan'])){
	
	if(!empty($sumber)){

        $sql_ubah = "UPDATE tiket SET
			namapembeli='".$_POST['namapembeli']."',
			tglberangkat='".$_POST['tglberangkat']."',
            harga='".$_POST['harga']."',
            penjemputan='".$_POST['penjemputan']."',
			tujuan='".$_POST['tujuan']."'	
			WHERE kodetiket='".$_POST['kodetiket']."'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tiket SET
			namapembeli='".$_POST['namapembeli']."',
			tglberangkat='".$_POST['tglberangkat']."',
            harga='".$_POST['harga']."',
            penjemputan='".$_POST['penjemputan']."',
			tujuan='".$_POST['tujuan']."'	
			WHERE kodetiket='".$_POST['kodetiket']."'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>alert('Ubah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else{
            echo "<script>alert('Ubah Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=edit.php'>";
        }
        }
?>

</html>
<!-- Elseif Channel -->