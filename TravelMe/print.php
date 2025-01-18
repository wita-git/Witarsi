<!DOCTYPE html>
<html>
<?php
$koneksi = new mysqli("localhost", "root", "", "travel");

// Periksa apakah parameter kode ada
if (isset($_GET['kode'])) {
    $idtiket = $_GET['kode'];

    // Query untuk mendapatkan data tiket berdasarkan ID
    $sql_tampil = "SELECT * FROM tiket WHERE idtiket = ?";
    $stmt = $koneksi->prepare($sql_tampil);
    $stmt->bind_param("i", $idtiket);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data) {
        echo "Tiket tidak ditemukan.";
        exit;
    }
} else {
    echo "Kode tiket tidak diberikan.";
    exit;
}
?>

<head>
    <title>Cetak Tiket</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .print-area {
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            background: #fff;
        }
    </style>
</head>

<body>

    <div class="container print-area">
        <h3 class="text-center">Tiket Perjalanan</h3>
        <hr>
        <p><strong>ID Tiket:</strong> <?php echo $data['idtiket']; ?></p>
        <p><strong>Kode Tiket:</strong> <?php echo $data['kodetiket']; ?></p>
        <p><strong>Nama Pembeli:</strong> <?php echo $data['namapembeli']; ?></p>
        <p><strong>Tanggal Berangkat:</strong> <?php echo $data['tglberangkat']; ?></p>
        <p><strong>Penjemputan:</strong> <?php echo $data['penjemputan']; ?></p>
        <p><strong>Tujuan:</strong> <?php echo $data['tujuan']; ?></p>
        <p><strong>Harga:</strong> <?php echo $data['harga']; ?></p>
        <hr>
        <button onclick="window.print()" class="btn btn-primary">Cetak</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>

</body>

</html>
