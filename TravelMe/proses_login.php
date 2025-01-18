<?php
$koneksi = new mysqli("localhost", "root", "", "travel");

if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Mendapatkan data yang dikirim melalui form login
$username = $_POST['username'];
$password = $_POST['password'];

// Melakukan query untuk mendapatkan data pengguna berdasarkan username
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) {
        // Login berhasil, lakukan tindakan sesuai kebutuhan
        echo "Login berhasil!";
        header("Location: index.php");
        exit();
    } else {
        echo "Password salah!";
    }
} else {
    echo "Username tidak ditemukan!";
}

$koneksi->close();
?>
