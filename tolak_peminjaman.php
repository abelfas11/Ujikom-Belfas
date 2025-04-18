<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman = 'ditolak' WHERE id_peminjaman = $id");
echo "<script>alert('Peminjaman ditolak.'); location.href='?page=peminjaman_konfirmasi';</script>";
?>
