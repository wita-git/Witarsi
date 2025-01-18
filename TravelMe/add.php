<!DOCTYPE html>
<html>
<?php
$koneksi = new mysqli ("localhost","root","","travel");
?>

<head>
	<title>APLIKASI TRAVELME</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	<style>
		body{ 
				background-color: #DBF9FC;
			}
	</style>
</head>

<body>

	<div class="container">
		<div class="col-lg-8">
			<div class="page-header">
				<br>
				<br>
				<h2>TAMBAH TIKET</h2>
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

				<div class="form-group">
					<input type="submit" name="Simpan" value="Simpan Data" class="btn btn-primary">
					<a href="index.php" class="btn btn-warning">Batal</a>
				</div>
			</form>
		</div>
	</div>

</body>

<?php	
    if (isset ($_POST['Simpan'])){
        
        $sql_simpan = "INSERT INTO tiket (`kodetiket`, `namapembeli`, `tglberangkat`, `harga`, `penjemputan`, `tujuan`) VALUES (
			'".$_POST['kodetiket']."',
			'".$_POST['namapembeli']."',
			'".$_POST['tglberangkat']."',
			'".$_POST['harga']."',
            '".$_POST['penjemputan']."',
            '".$_POST['tujuan']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);

        if ($query_simpan) {
            echo "<script>alert('Tambah Data Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        }else{
            echo "<script>alert('Tambah Data Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=add.php'>";
        }
        }
?>

</html>
<!-- Elseif Channel -->