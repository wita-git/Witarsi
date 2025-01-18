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
		body { 
				background-color: #deb887;
			}
	</style>
</head>

<body>

	<div class="container">
		<div class="col-lg-12">
			<div class="page-header">
				<br>
				<br>
				<h2>TRAVEL ME
					<a href="add.php" class="btn btn-success">Tambah Tiket</a>
					<a href="logout.php" class="btn btn-danger">Log Out</a>
				</h2>
			</div>
			<br>
			<div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID TIKET</th>
							<th>KODE TIKET</th>
							<th>NAMA PEMBELI</th>
							<th>TGL BERANGKAT</th>
							<th>PENJEMPUTAN</th>
                            <th>TUJUAN</th>
                            <th>HARGA</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql_tampil = "SELECT * FROM tiket";
							$query_tampil = mysqli_query($koneksi, $sql_tampil);
							$idtiket=1;
							while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
						?>
						<tr>
							<td>
								<?php echo $idtiket; ?>
							</td>
							<td>
								<?php echo $data['kodetiket']; ?>
							</td>
							<td>
								<?php echo $data['namapembeli']; ?>
							</td>
							<td>
								<?php echo $data['tglberangkat']; ?>
							</td>
                            <td>
								<?php echo $data['penjemputan']; ?>
							</td>
                            <td>
								<?php echo $data['tujuan']; ?>
							</td>
                            <td>
								<?php echo $data['harga']; ?>
							</td>

							<td>
								<!-- <a href="edit.php?kode=<?php echo $data['idtiket']; ?>" class='btn btn-warning btn-sm'>Ubah</a> -->
								<a href="del.php?kode=<?php echo $data['idtiket']; ?>" onclick="return confirm('Hapus Data Ini ?')"
								 class='btn btn-danger btn-sm'>Hapus</a>
								<a href="print.php?kode=<?php echo $data['idtiket']; ?>" class='btn btn-info btn-sm'>Cetak</a>
							</td>

						</tr>
						<?php
							$idtiket++;
							}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

</body>

</html>
<!-- Elseif Channel -->